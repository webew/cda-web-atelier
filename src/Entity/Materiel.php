<?php

namespace App\Entity;

use App\Repository\MaterielRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaterielRepository::class)]
class Materiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(length: 50)]
    private ?string $refConstructeur = null;

    #[ORM\Column(length: 50)]
    private ?string $numSerie = null;

    #[ORM\ManyToOne()]
    private ?Marque $marque = null;

    #[ORM\ManyToOne()]
    private ?Type $type = null;

    // #[ORM\ManyToOne(inversedBy: 'materiels', fetch: "LAZY")]
    // private ?Client $client = null;
    #[ORM\ManyToOne()]
    private ?Client $client = null;

    // #[ORM\OneToMany(mappedBy: 'materiel', targetEntity: Ticket::class)]
    // private Collection $tickets;

    public function __construct()
    {
        // $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getRefConstructeur(): ?string
    {
        return $this->refConstructeur;
    }

    public function setRefConstructeur(string $refConstructeur): self
    {
        $this->refConstructeur = $refConstructeur;

        return $this;
    }

    public function getNumSerie(): ?string
    {
        return $this->numSerie;
    }

    public function setNumSerie(string $numSerie): self
    {
        $this->numSerie = $numSerie;

        return $this;
    }

    public function getMarque(): ?Marque
    {
        return $this->marque;
    }

    public function setMarque(?Marque $marque): self
    {
        $this->marque = $marque;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType(?Type $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

    // /**
    //  * @return Collection<int, Ticket>
    //  */
    // public function getTickets(): Collection
    // {
    //     return $this->tickets;
    // }

    // public function addTicket(Ticket $ticket): self
    // {
    //     if (!$this->tickets->contains($ticket)) {
    //         $this->tickets->add($ticket);
    //         $ticket->setMateriel($this);
    //     }

    //     return $this;
    // }

    // public function removeTicket(Ticket $ticket): self
    // {
    //     if ($this->tickets->removeElement($ticket)) {
    //         // set the owning side to null (unless already changed)
    //         if ($ticket->getMateriel() === $this) {
    //             $ticket->setMateriel(null);
    //         }
    //     }

    //     return $this;
    // }

    public function __toString(): string
    {
        return $this->designation . " - " . $this->numSerie;
    }
}
