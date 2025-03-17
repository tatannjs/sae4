<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom_Produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $Qte_Produit = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Prix_Produit_Unitaire = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $Id_Unite_Stock = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $Id_Unite_Prix = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeDeProduit $Id_Type_Produit = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producteur $Id_Prod = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomProduit(): ?string
    {
        return $this->Nom_Produit;
    }

    public function setNomProduit(string $Nom_Produit): static
    {
        $this->Nom_Produit = $Nom_Produit;

        return $this;
    }

    public function getQteProduit(): ?string
    {
        return $this->Qte_Produit;
    }

    public function setQteProduit(?string $Qte_Produit): static
    {
        $this->Qte_Produit = $Qte_Produit;

        return $this;
    }

    public function getPrixProduitUnitaire(): ?string
    {
        return $this->Prix_Produit_Unitaire;
    }

    public function setPrixProduitUnitaire(string $Prix_Produit_Unitaire): static
    {
        $this->Prix_Produit_Unitaire = $Prix_Produit_Unitaire;

        return $this;
    }

    public function getIdUniteStock(): ?Unite
    {
        return $this->Id_Unite_Stock;
    }

    public function setIdUniteStock(?Unite $Id_Unite_Stock): static
    {
        $this->Id_Unite_Stock = $Id_Unite_Stock;

        return $this;
    }

    public function getIdUnitePrix(): ?Unite
    {
        return $this->Id_Unite_Prix;
    }

    public function setIdUnitePrix(?Unite $Id_Unite_Prix): static
    {
        $this->Id_Unite_Prix = $Id_Unite_Prix;

        return $this;
    }

    public function getIdTypeProduit(): ?TypeDeProduit
    {
        return $this->Id_Type_Produit;
    }

    public function setIdTypeProduit(?TypeDeProduit $Id_Type_Produit): static
    {
        $this->Id_Type_Produit = $Id_Type_Produit;

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
}
