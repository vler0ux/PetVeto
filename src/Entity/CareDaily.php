<?php

namespace App\Entity;

use App\Repository\CareDailyRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareDailyRepository::class)]
class CareDaily
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $weight_tracking = null;

    #[ORM\Column(length: 255)]
    private ?string $food = null;

    #[ORM\Column(length: 255)]
    private ?string $behaviour = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeightTracking(): ?int
    {
        return $this->weight_tracking;
    }

    public function setWeightTracking(int $weight_tracking): static
    {
        $this->weight_tracking = $weight_tracking;

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
}
