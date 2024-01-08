<?php

// src/Controller/DemandController.php
namespace App\Controller;

use App\Service\DemandeManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemandController extends AbstractController
{
    /**
     * @Route("/demandes", name="demandes_index")
     */
    public function index(Request $request, DemandeManager $demandeManager, PaginatorInterface $paginator): Response
    {
        // Create 100 demandes
        for ($i = 1; $i <= 100; $i++) {
            $title = "Titre de la demande $i";
            $description = "Description de la demande $i";
            $demandeManager->createDemande($title, $description);
        }

        // Get all demandes
        $demandes = $demandeManager->getDemandes();

        // Paginate the demandes
        $pagination = $paginator->paginate(
            $demandes,
            $request->query->getInt('page', 1),
            10 // Number of items per page
        );

        return $this->render('demand/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
}


