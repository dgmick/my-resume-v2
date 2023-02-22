<?php

namespace App\Entity;

use App\Repository\ProfessionalSkillRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfessionalSkillRepository::class)]
class ProfessionalSkill
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $techno = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $framework = null;

    #[ORM\Column(length: 50)]
    private ?string $universe = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTechno(): ?string
    {
        return $this->techno;
    }

    public function setTechno(string $techno): self
    {
        $this->techno = $techno;

        return $this;
    }

    public function getFramework(): ?string
    {
        return $this->framework;
    }

    public function setFramework(?string $framework): self
    {
        $this->framework = $framework;

        return $this;
    }

    public function getUniverse(): ?string
    {
        return $this->universe;
    }

    public function setUniverse(string $universe): self
    {
        $this->universe = $universe;

        return $this;
    }
}
