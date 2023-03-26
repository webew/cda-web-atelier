<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $raisonSociale = null;

    // #[ORM\OneToMany(mappedBy: 'client', targetEntity: Materiel::class, fetch: "LAZY")]
    // private Collection $materiels;

    // #[ORM\OneToMany(mappedBy: 'client', targetEntity: Ticket::class)]
    // private Collection $tickets;

    public function __construct()
    {
        // $this->materiels = new ArrayCollection();
        // $this->tickets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raisonSociale;
    }

    public function setRaisonSociale(string $raisonSociale): self
    {
        $this->raisonSociale = $raisonSociale;

        return $this;
    }

    // /**
    //  * @return Collection<int, Materiel>
    //  */
    // public function getMateriels(): Collection
    // {
    //     return $this->materiels;
    // }

    // public function addMateriel(Materiel $materiel): self
    // {
    //     if (!$this->materiels->contains($materiel)) {
    //         $this->materiels->add($materiel);
    //         $materiel->setClient($this);
    //     }

    //     return $this;
    // }

    // public function removeMateriel(Materiel $materiel): self
    // {
    //     if ($this->materiels->removeElement($materiel)) {
    //         // set the owning side to null (unless already changed)
    //         if ($materiel->getClient() === $this) {
    //             $materiel->setClient(null);
    //         }
    //     }

    //     return $this;
    // }

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
    //         $ticket->setClient($this);
    //     }

    //     return $this;
    // }

    // public function removeTicket(Ticket $ticket): self
    // {
    //     if ($this->tickets->removeElement($ticket)) {
    //         // set the owning side to null (unless already changed)
    //         if ($ticket->getClient() === $this) {
    //             $ticket->setClient(null);
    //         }
    //     }

    //     return $this;
    // }

    public function __toString(): string
    {
        return $this->raisonSociale;
    }
}
