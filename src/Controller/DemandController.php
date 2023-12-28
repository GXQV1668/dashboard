<?php

// src/Controller/DemandController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandController extends AbstractController
{
    /**
     * @Route("/demands", name="demands")
     */
    public function index(): Response
    {
        // Assume that you have retrieved demands from the database or another source
        $demands = [
            ['id' => 1, 'title' => 'Demand 1', 'description' => 'Description 1'],
            ['id' => 2, 'title' => 'Demand 2', 'description' => 'Description 2'],
            // Add more demands as needed
        ];

        return $this->render('demand/index.html.twig', [
            'demands' => $demands,  // Pass the demands variable to the template
        ]);
    }
}

