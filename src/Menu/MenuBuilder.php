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
        $menu = $this->factory->createItem('root');
        
        $menu->addChild('Home', ['route' => 'app_main']);
        $menu->addChild('Customer List', ['route' => 'app_customer']);
        $menu->addChild('Create Customer', ['route' => 'new_customer']);
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