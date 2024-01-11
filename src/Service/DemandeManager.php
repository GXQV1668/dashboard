<?php
// src/Service/DemandeManager.php

namespace App\Service;

use App\Entity\Demande;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder; // Add this line

class DemandeManager
{
    private $demandes = [];
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createDemande($title, $description)
    {
        $demande = new Demande($title, $description);
        $this->demandes[] = $demande;

        return $demande;
    }

    public function getDemandes()
    {
        return $this->demandes;
    }

    public function getAllDemandesQueryBuilder(): QueryBuilder
    {
        return $this->entityManager
            ->getRepository(Demande::class)
            ->createQueryBuilder('d')
            ->orderBy('d.createdAt', 'DESC');
    }
}
