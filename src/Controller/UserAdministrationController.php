<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserAdministrationController extends AbstractController
{
    /*#[Route('/user/administration', name: 'app_user_administration')]*/
    public function index(): Response
    {
        return $this->render('user_administration/index.html.twig', [
            'controller_name' => 'UserAdministrationController',
        ]);
    }
}
