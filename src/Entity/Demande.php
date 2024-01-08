<?php

// src/Entity/Demande.php

namespace App\Entity;

class Demande
{
    private $id;
    private $title;
    private $description;
    private $status;
    private $createdAt;

    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
        $this->status = 'Ouverte';
        $this->createdAt = new \DateTime();
    }

    // Getter method for the "title" property
    public function getTitle()
    {
        return $this->title;
    }

    // Getter method for the "status" property
    public function getStatus()
    {
        return $this->status;
    }

    // ... (Define getter methods for other properties)

    public function closeDemande()
    {
        $this->status = 'Fermée';
    }
}

