<?php
// src/Service/DemandeManager.php

namespace App\Service;

use App\Entity\Demande;

class DemandeManager
{
    private $demandes = [];

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
}
