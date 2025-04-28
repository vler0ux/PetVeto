<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use App\Repository\CareRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: CareRepository::class)]
class Care
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $examDate= null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $vaccinationDate = null;

    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'cares')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\Column]
    private ?float $weight = null;

    #[ORM\Column(length: 255)]
    private ?string $food = null;

    #[ORM\Column(length: 255)]
    private ?string $behaviour = null;

    #[ORM\ManyToOne(inversedBy: 'cares')]
    #[ORM\JoinColumn(nullable: false)]
    #[Assert\NotNull(message: "Un vétérinaire doit être sélectionné pour enregistrer un soin.")]

    private ?Veto $veto = null;

    #[ORM\Column(length: 255)]
    private ?string $careName = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getexamDate(): ?\DateTimeInterface
    {
        return $this->examDate;
    }

    public function setexamDate(\DateTimeInterface $examDate): static
    {
        $this->examDate= $examDate;

        return $this;
    }

    public function getVaccinationDate(): ?\DateTimeInterface
    {
        return $this->vaccinationDate;
    }

    public function setVaccinationDate(\DateTimeInterface $vaccinationDate): static
    {
        $this->vaccinationDate = $vaccinationDate;

        return $this;
    }

    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    public function setAnimal(?Animal $animal): static
    {
        $this->animal = $animal;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(float $weight): static
    {
        $this->weight = $weight;

        return $this;
    }

    public function getFood(): ?string
    {
        return $this->food;
    }

    public function setFood(string $food): static
    {
        $this->food = $food;

        return $this;
    }

    public function getBehaviour(): ?string
    {
        return $this->behaviour;
    }

    public function setBehaviour(string $behaviour): static
    {
        $this->behaviour = $behaviour;

        return $this;
    }

    public function getVeto(): ?Veto
    {
        return $this->veto;
    }

    public function setVeto(?Veto $veto): static
    {
        $this->veto = $veto;

        return $this;
    }

    public function getCareName(): ?string
    {
        return $this->careName;
    }

    public function setCareName(?string $careName): static
    {
        $this->careName = $careName;

        return $this;
    }

}
