<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventManagerController extends AbstractController
{
    /*#[Route('/event/manager', name: 'app_event_manager')]*/
    public function index(): Response
    {
        return $this->render('event_manager/index.html.twig', [
            'controller_name' => 'EventManagerController',
        ]);
    }
}
