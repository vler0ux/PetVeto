<?php

namespace App\Entity;

use App\Repository\CareNameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareNameRepository::class)]
class CareName
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nameTypeCare = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameTypeCare(): ?string
    {
        return $this->nameTypeCare;
    }

    public function setNameTypeCare(string $nameTypeCare): static
    {
        $this->nameTypeCare = $nameTypeCare;

        return $this;
    }
}
