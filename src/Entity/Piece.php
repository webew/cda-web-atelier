<?php

namespace App\Entity;

use App\Repository\PieceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PieceRepository::class)]
class Piece
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $puAchatHt = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $puVenteHt = null;

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

    public function getPuAchatHt(): ?string
    {
        return $this->puAchatHt;
    }

    public function setPuAchatHt(string $puAchatHt): self
    {
        $this->puAchatHt = $puAchatHt;

        return $this;
    }

    public function getPuVenteHt(): ?string
    {
        return $this->puVenteHt;
    }

    public function setPuVenteHt(string $puVenteHt): self
    {
        $this->puVenteHt = $puVenteHt;

        return $this;
    }
}
