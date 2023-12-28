<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", name="search")
     * @return Response
     */
    public function searchPage(): Response
    {
        return $this->render('search.html.twig');
    }

    /**
     * @Route("/search-results", name="search_results")
     * @param Request $request
     * @return Response
     */
    public function searchResults(Request $request): Response
    {
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->query->get('searchTerm');

        // Ici, vous pourriez effectuer la logique de recherche en utilisant le terme de recherche
        // et renvoyer les résultats à la vue appropriée.

        // Pour cet exemple, nous allons simplement afficher le terme de recherche.
        return $this->render('search_results.html.twig', [
            'searchTerm' => $searchTerm,
        ]);
    }
}
