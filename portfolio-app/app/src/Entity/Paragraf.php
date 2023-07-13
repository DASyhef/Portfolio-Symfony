<?php

namespace App\Entity;

use App\Repository\ParagrafRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParagrafRepository::class)]
class Paragraf
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $paragraf = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParagraf(): ?string
    {
        return $this->paragraf;
    }

    public function setParagraf(string $paragraf): static
    {
        $this->paragraf = $paragraf;

        return $this;
    }
}
