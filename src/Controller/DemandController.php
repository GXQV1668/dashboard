<?php

// src/Controller/DemandController.php
namespace App\Controller;

use App\Entity\Demande;
use App\Entity\User;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\SearchDemandeType;

class DemandController extends AbstractController
{
    /**
     * @Route("/demandes", name="demandes_index")
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        // Create 10 demandes with different statuses
        $demandes = [];
        $user = $this->getUser();
        for ($i = 1; $i <= 100; $i++) {
            $title = "demande $i";
            $description = "Description de la demande $i";
            $demande = new Demande($title, $description);
            $demandes[] = $demande;
        }


        // Create search form
        $form = $this->createForm(SearchDemandeType::class);
        $form->handleRequest($request);

        // Filter demandes based on search form
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $demandes = $this->filterDemandes($demandes, $data['title']);
        }

        // Paginate the demandes
        $pagination = $paginator->paginate(
            $demandes,
            $request->query->getInt('page', 1),
            15 // Number of items per page
        );

        return $this->render('demand/index.html.twig', [
            'pagination' => $pagination,
            'form' => $form->createView(),
        ]);
    }

/**
 * Filter demandes based on title and status.
 *
 * @param array $demandes
 * @param string|null $title
 * @param string|null $status
 *
 * @return array
 */
private function filterDemandes(array $demandes, ?string $title): array
{
    // Apply title filter
    if ($title !== null) {
        $demandes = array_filter($demandes, function (Demande $demande) use ($title) {
            return stripos($demande->getTitle(), $title) !== false;
        });
    }


    return $demandes;
}
public function view($id, PaginatorInterface $paginator): Response
{
    // Récupérez la collection de demandes (peut-être en la passant depuis l'action index)
    $user = $this->getUser();
    $demandes = [];

    for ($i = 1; $i <= 100; $i++) {
        $title = "demande $i";
        $description = "Description de la demande $i";
        $demande = new Demande($title, $description);
        $demandes[] = $demande;
    }

    // Recherchez la demande avec l'ID spécifié
    $selectedDemande = null;
    foreach ($demandes as $demande) {
        if ($demande->getId() == $id) {
            $selectedDemande = $demande;
            break;
        }
    }

    // Vérifiez si la demande a été trouvée
    if ($selectedDemande === null) {
        throw $this->createNotFoundException('La demande n\'existe pas');
    }

    // Passez les détails de la demande à la vue
    return $this->render('demand/view.html.twig', [
        'demande' => $selectedDemande,
    ]);
}
}