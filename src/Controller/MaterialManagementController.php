<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaterialManagementController extends AbstractController
{
    #[Route('/material/management', name: 'app_material_management')]
    public function index(): Response
    {
        return $this->render('material_management/index.html.twig', [
            'controller_name' => 'MaterialManagementController',
        ]);
    }
}
