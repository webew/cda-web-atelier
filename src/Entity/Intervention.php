<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InterventionRepository::class)]
class Intervention
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateIntervention = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $actionEffectuee = null;

    #[ORM\Column]
    private ?int $tempsPasse = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    private ?Statut $statutTicket = null;

    #[ORM\ManyToOne(inversedBy: 'interventions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Ticket $ticket = null;

    #[ORM\ManyToOne()]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateIntervention(): ?\DateTimeInterface
    {
        return $this->dateIntervention;
    }

    public function setDateIntervention(\DateTimeInterface $dateIntervention): self
    {
        $this->dateIntervention = $dateIntervention;

        return $this;
    }

    public function getActionEffectuee(): ?string
    {
        return $this->actionEffectuee;
    }

    public function setActionEffectuee(string $actionEffectuee): self
    {
        $this->actionEffectuee = $actionEffectuee;

        return $this;
    }

    public function getTempsPasse(): ?int
    {
        return $this->tempsPasse;
    }

    public function setTempsPasse(int $tempsPasse): self
    {
        $this->tempsPasse = $tempsPasse;

        return $this;
    }

    public function getStatutTicket(): ?Statut
    {
        return $this->statutTicket;
    }

    public function setStatutTicket(?Statut $statutTicket): self
    {
        $this->statutTicket = $statutTicket;

        return $this;
    }

    public function getTicket(): ?Ticket
    {
        return $this->ticket;
    }

    public function setTicket(?Ticket $ticket): self
    {
        $this->ticket = $ticket;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
