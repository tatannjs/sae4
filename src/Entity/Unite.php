<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteRepository::class)]
class Unite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Unite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomUnite(): ?string
    {
        return $this->Nom_Unite;
    }

    public function setNomUnite(string $Nom_Unite): static
    {
        $this->Nom_Unite = $Nom_Unite;

        return $this;
    }
}
