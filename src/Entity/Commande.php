<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Statut $Id_Statut = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producteur $Id_Prod = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Id_Uti = null;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getIdStatut(): ?Statut
    {
        return $this->Id_Statut;
    }

    public function setIdStatut(?Statut $Id_Statut): static
    {
        $this->Id_Statut = $Id_Statut;

        return $this;
    }

    public function getIdProd(): ?Producteur
    {
        return $this->Id_Prod;
    }

    public function setIdProd(?Producteur $Id_Prod): static
    {
        $this->Id_Prod = $Id_Prod;

        return $this;
    }

    public function getIdUti(): ?Utilisateur
    {
        return $this->Id_Uti;
    }

    public function setIdUti(?Utilisateur $Id_Uti): static
    {
        $this->Id_Uti = $Id_Uti;

        return $this;
    }
}
