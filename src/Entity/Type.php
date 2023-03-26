<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeRepository::class)]
class Type
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    // #[ORM\OneToMany(mappedBy: 'type', targetEntity: Materiel::class)]
    // private Collection $materiels;

    public function __construct()
    {
        // $this->materiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
    //         $materiel->setType($this);
    //     }

    //     return $this;
    // }

    // public function removeMateriel(Materiel $materiel): self
    // {
    //     if ($this->materiels->removeElement($materiel)) {
    //         // set the owning side to null (unless already changed)
    //         if ($materiel->getType() === $this) {
    //             $materiel->setType(null);
    //         }
    //     }

    //     return $this;
    // }

    public function __toString(): string
    {
        return $this->libelle;
    }
}
