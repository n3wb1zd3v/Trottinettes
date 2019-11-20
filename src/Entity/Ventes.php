<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VentesRepository")
 * @ApiResource
 */
class Ventes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reservations", inversedBy="listVentes", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $reservationId;

    /**
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $prixTotal;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $typePaiement;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePaiement;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $refPaiement;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReservationId(): ?Reservations
    {
        return $this->reservationId;
    }

    public function setReservationId(Reservations $reservationId): self
    {
        $this->reservationId = $reservationId;

        return $this;
    }

    public function getPrixTotal(): ?string
    {
        return $this->prixTotal;
    }

    public function setPrixTotal(string $prixTotal): self
    {
        $this->prixTotal = $prixTotal;

        return $this;
    }

    public function getTypePaiement(): ?string
    {
        return $this->typePaiement;
    }

    public function setTypePaiement(string $typePaiement): self
    {
        $this->typePaiement = $typePaiement;

        return $this;
    }

    public function getDatePaiement(): ?\DateTimeInterface
    {
        return $this->datePaiement;
    }

    public function setDatePaiement(\DateTimeInterface $datePaiement): self
    {
        $this->datePaiement = $datePaiement;

        return $this;
    }

    public function getRefPaiement(): ?string
    {
        return $this->refPaiement;
    }

    public function setRefPaiement(string $refPaiement): self
    {
        $this->refPaiement = $refPaiement;

        return $this;
    }
}
