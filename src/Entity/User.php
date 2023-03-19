<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface 
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255)]
    private ?string $Categorie = null;

    #[ORM\Column(length: 255)]
    private ?string $Grade = null;

    #[ORM\Column(length: 255)]
    private ?string $Service = null;

    #[ORM\Column(length: 255)]
    private ?string $Poste = null;

    #[ORM\Column(length: 255)]
    private ?string $heures = null;

    #[ORM\Column(length: 255)]
    private ?string $ARTT = null;

    #[ORM\Column(length: 255)]
    private ?string $CP = null;

    #[ORM\OneToMany(mappedBy: 'interventionUser', targetEntity: Intervention::class)]
    private Collection $interventionUser;

    #[ORM\OneToMany(mappedBy: 'astreinteUser', targetEntity: AstreintesUsers::class)]
    private Collection $astreintes;

    public function __construct()
    {
        $this->interventionUser = new ArrayCollection();
        $this->astreintes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->Categorie;
    }

    public function setCategorie(string $Categorie): self
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->Grade;
    }

    public function setGrade(string $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    public function getService(): ?string
    {
        return $this->Service;
    }

    public function setService(string $Service): self
    {
        $this->Service = $Service;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->Poste;
    }

    public function setPoste(string $Poste): self
    {
        $this->Poste = $Poste;

        return $this;
    }

    public function getHeures(): ?string
    {
        return $this->heures;
    }

    public function setHeures(string $heures): self
    {
        $this->heures = $heures;

        return $this;
    }

    public function getARTT(): ?string
    {
        return $this->ARTT;
    }

    public function setARTT(string $ARTT): self
    {
        $this->ARTT = $ARTT;

        return $this;
    }

    public function getCP(): ?string
    {
        return $this->CP;
    }

    public function setCP(string $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    /**
     * @return Collection<int, AstreintesUsers>
     */
    public function getAstreintes(): Collection
    {
        return $this->astreintes;
    }

    public function addAstreinte(AstreintesUsers $astreinte): self
    {
        if (!$this->astreintes->contains($astreinte)) {
            $this->astreintes->add($astreinte);
            $astreinte->setAstreinteUser($this);
        }

        return $this;
    }

    public function removeAstreinte(AstreintesUsers $astreinte): self
    {
        if ($this->astreintes->removeElement($astreinte)) {
            // set the owning side to null (unless already changed)
            if ($astreinte->getAstreinteUser() === $this) {
                $astreinte->setAstreinteUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, InterventionUsers>
     */
    public function getIntervention(): Collection
    {
        return $this->interventionUser;
    }

    public function addIntervention(Intervention $interventionUser): self
    {
        if (!$this->astreintes->contains($interventionUser)) {
            $this->astreintes->add($interventionUser);
            $interventionUser->setInterventionUser($this);
        }

        return $this;
    }

    public function removeIntervention(Intervention $interventionUser): self
    {
        if ($this->interventionUser->removeElement($interventionUser)) {
            // set the owning side to null (unless already changed)
            if ($interventionUser->getInterventionUser() === $this) {
                $interventionUser->setInterventionUser(null);
            }
        }

        return $this;
    }
 }