<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 180, unique: true)]
  private ?string $email = null;

  #[ORM\Column]
  private array $roles = [];

  /**
   * @var string The hashed password
   */
  #[ORM\Column]
  private ?string $password = null;

  #[ORM\Column(length: 255)]
  private ?string $name = null;

  #[ORM\Column(length: 255)]
  private ?string $surName = null;

  #[ORM\Column(length: 100, nullable: true)]
  private ?string $city = null;

  #[ORM\ManyToMany(targetEntity: Allergene::class, inversedBy: 'users')]
  private Collection $allergenes;

  #[ORM\ManyToMany(targetEntity: Diet::class, inversedBy: 'users')]
  private Collection $diets;

  public function __construct()
  {
      $this->allergenes = new ArrayCollection();
      $this->diets = new ArrayCollection();
  }

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(string $email): static
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

  public function setRoles(array $roles): static
  {
    $this->roles = $roles;

    return $this;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string
  {
    return $this->password;
  }

  public function setPassword(string $password): static
  {
    $this->password = $password;

    return $this;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials(): void
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

  public function getName(): ?string
  {
    return $this->name;
  }

  public function setName(string $name): static
  {
    $this->name = $name;

    return $this;
  }

  public function getSurName(): ?string
  {
    return $this->surName;
  }

  public function setSurName(string $surName): static
  {
    $this->surName = $surName;

    return $this;
  }

  public function getCity(): ?string
  {
    return $this->city;
  }

  public function setCity(?string $city): static
  {
    $this->city = $city;

    return $this;
  }

  /**
   * @return Collection<int, Allergene>
   */
  public function getAllergenes(): Collection
  {
      return $this->allergenes;
  }

  public function addAllergene(Allergene $allergene): static
  {
      if (!$this->allergenes->contains($allergene)) {
          $this->allergenes->add($allergene);
      }

      return $this;
  }

  public function removeAllergene(Allergene $allergene): static
  {
      $this->allergenes->removeElement($allergene);

      return $this;
  }

  /**
   * @return Collection<int, Diet>
   */
  public function getDiets(): Collection
  {
      return $this->diets;
  }

  public function addDiet(Diet $diet): static
  {
      if (!$this->diets->contains($diet)) {
          $this->diets->add($diet);
      }

      return $this;
  }

  public function removeDiet(Diet $diet): static
  {
      $this->diets->removeElement($diet);

      return $this;
  }

  public function __toString() {
    return $this->name;
  }

}