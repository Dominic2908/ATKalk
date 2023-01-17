<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SalesManagementController extends AbstractController
{
    #[Route('/sales/management', name: 'app_sales_management')]
    public function index(): Response
    {
        return $this->render('sales_management/index.html.twig', [
            'controller_name' => 'SalesManagementController',
        ]);
    }
}
