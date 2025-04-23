<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use App\Repository\CareRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareRepository::class)]
class Care
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $vaccinations = null;

    #[ORM\Column(length: 255)]
    private ?string $treatment = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $examDate= null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $vaccinationDate = null;

    #[ORM\ManyToOne(targetEntity: Animal::class, inversedBy: 'soins')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Animal $animal = null;

    #[ORM\Column]
    private ?int $weight = null;

    #[ORM\Column(length: 255)]
    private ?string $food = null;

    #[ORM\Column(length: 255)]
    private ?string $behaviour = null;

    #[ORM\ManyToOne(inversedBy: 'cares')]
    private ?veto $veto = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaccinations(): ?string
    {
        return $this->vaccinations;
    }

    public function setvaccinations(string $vaccinations): static
    {
        $this->vaccinations = $vaccinations;

        return $this;
    }

    public function getTreatment(): ?string
    {
        return $this->treatment;
    }

    public function setTreatment(string $treatment): static
    {
        $this->treatment = $treatment;

        return $this;
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

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(int $weight): static
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

    public function getVeto(): ?veto
    {
        return $this->veto;
    }

    public function setVeto(?veto $veto): static
    {
        $this->veto = $veto;

        return $this;
    }
}
