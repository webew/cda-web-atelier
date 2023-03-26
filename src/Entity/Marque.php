<?php

namespace App\Entity;

use App\Repository\MarqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarqueRepository::class)]
class Marque
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    // #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Materiel::class)]
    // private Collection $materiels;

    public function __construct()
    {
        // $this->materiels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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
    //         $materiel->setMarque($this);
    //     }

    //     return $this;
    // }

    // public function removeMateriel(Materiel $materiel): self
    // {
    //     if ($this->materiels->removeElement($materiel)) {
    //         // set the owning side to null (unless already changed)
    //         if ($materiel->getMarque() === $this) {
    //             $materiel->setMarque(null);
    //         }
    //     }

    //     return $this;
    // }

    public function __toString(): string
    {
        return $this->nom;
    }
}
