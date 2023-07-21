<?php

namespace App\Entity;

use App\Repository\SkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkillRepository::class)]
class Skill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Skill = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSkill(): ?string
    {
        return $this->Skill;
    }

    public function setSkill(string $Skill): static
    {
        $this->Skill = $Skill;

        return $this;
    }
}
