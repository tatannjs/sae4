<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageRepository::class)]
class Message
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Emetteur = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Destinataire = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date_Msg = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Date_Expi_Msg = null;

    #[ORM\Column(length: 2048)]
    private ?string $Contenu_Msg = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmetteur(): ?Utilisateur
    {
        return $this->Emetteur;
    }

    public function setEmetteur(?Utilisateur $Emetteur): static
    {
        $this->Emetteur = $Emetteur;

        return $this;
    }

    public function getDestinataire(): ?Utilisateur
    {
        return $this->Destinataire;
    }

    public function setDestinataire(?Utilisateur $Destinataire): static
    {
        $this->Destinataire = $Destinataire;

        return $this;
    }

    public function getDateMsg(): ?\DateTimeInterface
    {
        return $this->Date_Msg;
    }

    public function setDateMsg(\DateTimeInterface $Date_Msg): static
    {
        $this->Date_Msg = $Date_Msg;

        return $this;
    }

    public function getDateExpiMsg(): ?\DateTimeInterface
    {
        return $this->Date_Expi_Msg;
    }

    public function setDateExpiMsg(\DateTimeInterface $Date_Expi_Msg): static
    {
        $this->Date_Expi_Msg = $Date_Expi_Msg;

        return $this;
    }

    public function getContenuMsg(): ?string
    {
        return $this->Contenu_Msg;
    }

    public function setContenuMsg(string $Contenu_Msg): static
    {
        $this->Contenu_Msg = $Contenu_Msg;

        return $this;
    }
}
