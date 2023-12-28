<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterDashboardController extends AbstractController
{
    /*#[Route('/master/dashboard', name: 'app_master_dashboard')]*/
    public function index(): Response
    {
        return $this->render('master_dashboard/index.html.twig', [
            'controller_name' => 'MasterDashboardController',
        ]);
    }
}
