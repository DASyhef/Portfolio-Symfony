<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Project = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?string
    {
        return $this->Project;
    }

    public function setProject(string $Project): static
    {
        $this->Project = $Project;

        return $this;
    }
}
