<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Desc_Statut = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescStatut(): ?string
    {
        return $this->Desc_Statut;
    }

    public function setDescStatut(string $Desc_Statut): static
    {
        $this->Desc_Statut = $Desc_Statut;

        return $this;
    }
}
