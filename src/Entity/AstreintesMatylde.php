<?php

namespace App\Entity;

use App\Repository\AstreintesMatyldeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AstreintesMatyldeRepository::class)]
class AstreintesMatylde
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Heure = null;

    #[ORM\Column]
    private ?int $Duree_1 = null;

    #[ORM\Column]
    private ?int $Duree_2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Motif_Appel = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Intervention = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Motif_Intervention = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->Heure;
    }

    public function setHeure(\DateTimeInterface $Heure): self
    {
        $this->Heure = $Heure;

        return $this;
    }

    public function getDuree1(): ?int
    {
        return $this->Duree_1;
    }

    public function setDuree1(int $Duree_1): self
    {
        $this->Duree_1 = $Duree_1;

        return $this;
    }

    public function getDuree2(): ?int
    {
        return $this->Duree_2;
    }

    public function setDuree2(int $Duree_2): self
    {
        $this->Duree_2 = $Duree_2;

        return $this;
    }

    public function getMotifAppel(): ?string
    {
        return $this->Motif_Appel;
    }

    public function setMotifAppel(?string $Motif_Appel): self
    {
        $this->Motif_Appel = $Motif_Appel;

        return $this;
    }

    public function isIntervention(): ?bool
    {
        return $this->Intervention;
    }

    public function setIntervention(?bool $Intervention): self
    {
        $this->Intervention = $Intervention;

        return $this;
    }

    public function getMotifIntervention(): ?string
    {
        return $this->Motif_Intervention;
    }

    public function setMotifIntervention(?string $Motif_Intervention): self
    {
        $this->Motif_Intervention = $Motif_Intervention;

        return $this;
    }
}
