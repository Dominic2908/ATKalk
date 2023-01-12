<?php
namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;
    
    /**
     * Add any other dependency you need...
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }
    
    public function createMainMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root', array(
            'childrenAttributes'    => array(
                'class'             => 'nav nav-tabs',
            ),
            
        ));
        
        $menu2 = $this->factory->createItem('drop', array(
            'childrenAttributes'    => array(
                'class'             => 'nav nav-tabs',
            ),
        ));
        $menu->addChild('Home', ['route' => 'app_main']);
        $menu->setChildrenAttribute('class', 'nav');
        //$menu['Home']->setAttribute('class', 'nav-item active');
        //$menu['Home']->setLinkAttribute('class', 'nav-link');
        $menu->addChild('Customer', ['route' => 'app_customer']);
        /*$menu['Customer List']->setAttribute('class', 'dropdown');
         $menu['Customer List']->setLinkAttribute('class', 'nav-link');
         $menu['Customer List']->setChildrenAttribute('class', '')
         ->setChildrenAttribute('id', '');   */
        
        $menu['Customer']->addChild('Customer List', array('route' => 'app_customer'));
        
        $menu['Customer']->addChild('Create Customer', array('route' => 'new_customer'));
        
        $menu['Customer']->addChild('offers', array('route' => 'new_customer'));
        
        $menu['Customer']->addChild('invoices', array('route' => 'new_customer'));
        
        $menu->addChild('Material Mangement', ['route' => 'new_customer']);
        
        $menu->addChild('User', ['route' => 'new_customer']);
        
        $menu->addChild('Tickets', ['route' => 'new_customer']);
        //$menu['Create Customer']->setAttribute('class', 'nav-item');
        //$menu['Create Customer']->setLinkAttribute('class', 'nav-link');
        // ... add more children
        
        return $menu;
    }
    
    public function createSidebarMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('sidebar');
        
        if (isset($options['include_homepage']) && $options['include_homepage']) {
            $menu->addChild('Home', ['route' => 'app_main']);
            $menu->addChild('Customer List', ['route' => 'app_customer']);
            $menu->addChild('Create Customer', ['route' => 'new_customer']);
        }
        
        // ... add more children
        
        return $menu;
    }
}