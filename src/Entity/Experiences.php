<?php

namespace App\Entity;

use App\Repository\ExperiencesRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExperiencesRepository::class)]
class Experiences
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $jobRole = null;

    #[ORM\Column(length: 50)]
    private ?string $company = null;

    #[ORM\Column(length: 20)]
    private ?string $startAt = null;

    #[ORM\Column(length: 50)]
    private ?string $periodEnd = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $resume = null;

    #[ORM\Column]
    private ?bool $isExperience = null;

    #[ORM\Column(length: 20)]
    private ?string $jobStatus = null;

    #[ORM\Column(length: 50)]
    private ?string $localisation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJobRole(): ?string
    {
        return $this->jobRole;
    }

    public function setJobRole(string $jobRole): self
    {
        $this->jobRole = $jobRole;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    public function setStartAt(string $startAt): self
    {
        $this->startAt = $startAt;

        return $this;
    }

    public function getPeriodEnd(): ?string
    {
        return $this->periodEnd;
    }

    public function setPeriodEnd(string $periodEnd): self
    {
        $this->periodEnd = $periodEnd;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function isIsExperience(): ?bool
    {
        return $this->isExperience;
    }

    public function setIsExperience(bool $isExperience): self
    {
        $this->isExperience = $isExperience;

        return $this;
    }

    public function getJobStatus(): ?string
    {
        return $this->jobStatus;
    }

    public function setJobStatus(string $jobStatus): self
    {
        $this->jobStatus = $jobStatus;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->localisation;
    }

    public function setLocalisation(string $localisation): self
    {
        $this->localisation = $localisation;

        return $this;
    }
}
