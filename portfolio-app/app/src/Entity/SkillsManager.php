<?php

namespace App\Entity;

use App\Repository\SkillsManagerRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillsManagerRepository::class)]
class SkillsManager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Skills = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $IMG = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkills(): ?string
    {
        return $this->Skills;
    }

    public function setSkills(string $Skills): static
    {
        $this->Skills = $Skills;

        return $this;
    }

    public function getIMG(): ?string
    {
        return $this->IMG;
    }

    public function setIMG(string $IMG): static
    {
        $this->IMG = $IMG;

        return $this;
    }
}
