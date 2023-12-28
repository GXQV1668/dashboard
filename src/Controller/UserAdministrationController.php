<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UserAdministrationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/user/{id}", name="user_show")
     */
    public function showUser($id): Response
    {
        // Replace this with the logic to retrieve user details from the database
        $user = $this->getDummyUserData($id);

        return $this->render('user_administration/index.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/user_administration", name="user_administration_index")
     */
    public function index(Request $request): Response
    {
        // Replace this with the logic to generate 50 fictitious users
        $users = $this->getDummyUserDataRange(1, 100);

        $currentPage = $request->query->getInt('page', 1);
        $itemsPerPage = 10;

        $pagination = $this->calculatePagination($users, $currentPage, $itemsPerPage);

        return $this->render('user_administration/index.html.twig', $pagination);
    }

    private function getDummyUserData($id)
    {
        return [
            'id' => $id,
            'name' => 'User ' . $id,
            'surname' => 'user' . $id,
            'role' => 'User',
        ];
    }

    private function getDummyUserDataRange($start, $end)
    {
        $users = [];
        for ($i = $start; $i <= $end; $i++) {
            $users[] = $this->getDummyUserData($i);
        }
        return $users;
    }

    private function calculatePagination($items, $currentPage, $itemsPerPage)
    {
        $totalItems = count($items);
        $maxPages = ceil($totalItems / $itemsPerPage);

        return [
            'users' => array_slice($items, ($currentPage - 1) * $itemsPerPage, $itemsPerPage),
            'currentPage' => $currentPage,
            'maxPages' => $maxPages,
        ];
    }
}
