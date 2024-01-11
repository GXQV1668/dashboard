<?php

// src/Entity/Demande.php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
class Demande
{
    private $id;
    private $title;
    private $description;
    private $status;
    private $createdAt;
    private $user;

    public function __construct($title, $description)
    {
        $this->id = uniqid();
        $this->title = $title;
        $this->description = $description;
        $this->status = (rand(0, 1) === 0) ? '❌' : '✔'; // Alternating between Open and Closed
        $this->createdAt = new \DateTime();
    }
    

    public function getId()
    {
      return $this->id;
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
    public function getCreatedAt()  
    {
      return $this->createdAt;
    }

    // ... (Define getter methods for other properties)

    public function closeDemande()
    {
        $this->status = 'Fermée';
    }
}

