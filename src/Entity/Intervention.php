<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(length: 255)]
    private ?string $Action = null;

    #[ORM\Column(length: 255)]
    private ?string $Resultat = null;

    #[ORM\Column(length: 255)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $Lastname = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Horaire_1 = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Horaire_2 = null;

    #[ORM\Column]
    private ?int $Duration = null;

    #[ORM\ManyToOne(inversedBy: 'intervention')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $interventionUser = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAction(): ?string
    {
        return $this->Action;
    }

    public function setAction(string $Action): self
    {
        $this->Action = $Action;

        return $this;
    }

    public function getResultat(): ?string
    {
        return $this->Resultat;
    }

    public function setResultat(string $Resultat): self
    {
        $this->Resultat = $Resultat;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): self
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->Lastname;
    }

    public function setLastname(string $Lastname): self
    {
        $this->Lastname = $Lastname;

        return $this;
    }

    public function getHoraire1(): ?\DateTimeInterface
    {
        return $this->Horaire_1;
    }

    public function setHoraire1(\DateTimeInterface $Horaire_1): self
    {
        $this->Horaire_1 = $Horaire_1;

        return $this;
    }

    public function getHoraire2(): ?\DateTimeInterface
    {
        return $this->Horaire_2;
    }

    public function setHoraire2(\DateTimeInterface $Horaire_2): self
    {
        $this->Horaire_2 = $Horaire_2;

        return $this;
    }

    public function getDuration(): ?int
    {
        return $this->Duration;
    }

    public function setDuration(int $Duration): self
    {
        $this->Duration = $Duration;

        return $this;
    }

    public function getInterventionUser(): ?User
    {
        return $this->interventionUser;
    }

    public function setInterventionUser(?User $interventionUser): self
    {
        $this->interventionUser = $interventionUser;

        return $this;
    }
}
