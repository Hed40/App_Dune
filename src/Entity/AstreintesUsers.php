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

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $Time = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column]
    private ?int $Duration_1 = null;

    #[ORM\Column]
    private ?int $Duration_2 = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Intervention = null;

    #[ORM\ManyToOne(inversedBy: 'astreintes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $astreinteUser = null;

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

    public function getTime(): ?\DateTimeInterface
    {
        return $this->Time;
    }

    public function setTime(\DateTimeInterface $Time): self
    {
        $this->Time = $Time;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDuration1(): ?int
    {
        return $this->Duration_1;
    }

    public function setDuration1(int $Duration_1): self
    {
        $this->Duration_1 = $Duration_1;

        return $this;
    }

    public function getDuration2(): ?int
    {
        return $this->Duration_2;
    }

    public function setDuration2(int $Duration_2): self
    {
        $this->Duration_2 = $Duration_2;

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

    public function getAstreinteUser(): ?User
    {
        return $this->astreinteUser;
    }

    public function setAstreinteUser(?User $astreinteUser): self
    {
        $this->astreinteUser = $astreinteUser;

        return $this;
    }
}
