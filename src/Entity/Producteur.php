<?php

namespace App\Entity;

use App\Repository\ProducteurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProducteurRepository::class)]
class Producteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Prof_Prod = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Id_Uti = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProfProd(): ?string
    {
        return $this->Prof_Prod;
    }

    public function setProfProd(string $Prof_Prod): static
    {
        $this->Prof_Prod = $Prof_Prod;

        return $this;
    }

    public function getIdUti(): ?Utilisateur
    {
        return $this->Id_Uti;
    }

    public function setIdUti(Utilisateur $Id_Uti): static
    {
        $this->Id_Uti = $Id_Uti;

        return $this;
    }
}
