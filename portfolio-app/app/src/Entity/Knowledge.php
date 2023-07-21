<?php

namespace App\Entity;

use App\Repository\KnowledgeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KnowledgeRepository::class)]
class Knowledge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Knowledge = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKnowledge(): ?string
    {
        return $this->Knowledge;
    }

    public function setKnowledge(string $Knowledge): static
    {
        $this->Knowledge = $Knowledge;

        return $this;
    }
}
