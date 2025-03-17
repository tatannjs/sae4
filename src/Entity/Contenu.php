<?php

namespace App\Entity;

use App\Repository\ContenuRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContenuRepository::class)]
class Contenu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Qte_Produit_Commande = null;

    #[ORM\Column]
    private ?int $Num_Produit_Commande = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Produit $Id_Produit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Commande $Id_Commande = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQteProduitCommande(): ?int
    {
        return $this->Qte_Produit_Commande;
    }

    public function setQteProduitCommande(int $Qte_Produit_Commande): static
    {
        $this->Qte_Produit_Commande = $Qte_Produit_Commande;

        return $this;
    }

    public function getNumProduitCommande(): ?int
    {
        return $this->Num_Produit_Commande;
    }

    public function setNumProduitCommande(int $Num_Produit_Commande): static
    {
        $this->Num_Produit_Commande = $Num_Produit_Commande;

        return $this;
    }

    public function getIdProduit(): ?Produit
    {
        return $this->Id_Produit;
    }

    public function setIdProduit(?Produit $Id_Produit): static
    {
        $this->Id_Produit = $Id_Produit;

        return $this;
    }

    public function getIdCommande(): ?Commande
    {
        return $this->Id_Commande;
    }

    public function setIdCommande(?Commande $Id_Commande): static
    {
        $this->Id_Commande = $Id_Commande;

        return $this;
    }
}
