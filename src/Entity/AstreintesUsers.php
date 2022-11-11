<?php

namespace App\Entity;

use App\Repository\AstreintesUsersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AstreintesUsersRepository::class)]
class AstreintesUsers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'astreintes_users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(length: 255)]
    private ?string $Prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $heure = null;

    #[ORM\Column]
    private ?int $duree_1 = null;

    #[ORM\Column]
    private ?int $duree_2 = null;

    #[ORM\Column(length: 255)]
    private ?string $motif_appel = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $intervention = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motif_intervention = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
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
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDuree1(): ?int
    {
        return $this->duree_1;
    }

    public function setDuree1(int $duree_1): self
    {
        $this->duree_1 = $duree_1;

        return $this;
    }

    public function getDuree2(): ?int
    {
        return $this->duree_2;
    }

    public function setDuree2(int $duree_2): self
    {
        $this->duree_2 = $duree_2;

        return $this;
    }

    public function getMotifAppel(): ?string
    {
        return $this->motif_appel;
    }

    public function setMotifAppel(string $motif_appel): self
    {
        $this->motif_appel = $motif_appel;

        return $this;
    }

    public function getIntervention(): ?int
    {
        return $this->intervention;
    }

    public function setIntervention(?int $intervention): self
    {
        $this->intervention = $intervention;

        return $this;
    }

    public function getMotifIntervention(): ?string
    {
        return $this->motif_intervention;
    }

    public function setMotifIntervention(?string $motif_intervention): self
    {
        $this->motif_intervention = $motif_intervention;

        return $this;
    }
}
