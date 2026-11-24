<?php

namespace App\Entity;

use App\Repository\CollectRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Utilisateur;
use App\Entity\JeuVideo;
use App\Enum\StatutJeuEnum;

#[ORM\Entity(repositoryClass: CollectRepository::class)]
class Collect
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'collects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'collects')]
    #[ORM\JoinColumn(nullable: false)]
    private ?JeuVideo $jeuVideo = null;

    #[ORM\Column(length:20, enumType: StatutJeuEnum::class)]
    private StatutJeuEnum $statut = StatutJeuEnum::POSSEDE;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateModifStatut = null;

    #[ORM\Column]
    private float $prixAchat = 0.0;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateAchat = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getJeuVideo(): ?JeuVideo
    {
        return $this->jeuVideo;
    }

    public function setJeuVideo(?JeuVideo $jeuVideo): static
    {
        $this->jeuVideo = $jeuVideo;

        return $this;
    }

    public function getDateModifStatut(): ?\DateTimeImmutable
    {
        return $this->dateModifStatut;
    }

    public function setDateModifStatut(\DateTimeImmutable $dateModifStatut): static
    {
        $this->dateModifStatut = $dateModifStatut;

        return $this;
    }

    public function getPrixAchat(): float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(float $prixAchat): static
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeImmutable
    {
        return $this->dateAchat;
    }

    public function setDateAchat(?\DateTimeImmutable $dateAchat): static
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(?string $commentaire): static
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getStatut(): StatutJeuEnum
    {
        return $this->statut;
    }

    public function setStatut(StatutJeuEnum $statut): static
    {
        $this->statut = $statut;
        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}