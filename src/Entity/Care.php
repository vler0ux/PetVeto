<?php

namespace App\Entity;

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
    private ?string $vaccins = null;

    #[ORM\Column(length: 255)]
    private ?string $treatment = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $veto_examination = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $vaccin_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVaccins(): ?string
    {
        return $this->vaccins;
    }

    public function setVaccins(string $vaccins): static
    {
        $this->vaccins = $vaccins;

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

    public function getVetoExamination(): ?\DateTimeInterface
    {
        return $this->veto_examination;
    }

    public function setVetoExamination(\DateTimeInterface $veto_examination): static
    {
        $this->veto_examination = $veto_examination;

        return $this;
    }

    public function getVaccinDate(): ?\DateTimeInterface
    {
        return $this->vaccin_date;
    }

    public function setVaccinDate(\DateTimeInterface $vaccin_date): static
    {
        $this->vaccin_date = $vaccin_date;

        return $this;
    }
}
