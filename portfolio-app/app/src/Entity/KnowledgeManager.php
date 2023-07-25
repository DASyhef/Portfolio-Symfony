<?php

namespace App\Entity;

use App\Repository\KnowledgeManagerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KnowledgeManagerRepository::class)]
class KnowledgeManager
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Soft_and_Mad_Skills = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoftAndMadSkills(): ?string
    {
        return $this->Soft_and_Mad_Skills;
    }

    public function setSoftAndMadSkills(string $Soft_and_Mad_Skills): static
    {
        $this->Soft_and_Mad_Skills = $Soft_and_Mad_Skills;

        return $this;
    }
}
