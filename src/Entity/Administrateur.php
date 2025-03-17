<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdministrateurRepository::class)]
class Administrateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Id_Uti = null;

    public function getId(): ?int
    {
        return $this->id;
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
