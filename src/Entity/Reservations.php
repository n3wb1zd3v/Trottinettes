<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationsRepository")
 */
class Reservations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Parcours", inversedBy="listReservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcoursId;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Users", inversedBy="listReservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userId;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbPersonnes;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Ventes", mappedBy="reservationId", cascade={"persist", "remove"})
     */
    private $listVentes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Options")
     */
    private $listOptions;

    public function __construct()
    {
        $this->listOptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParcoursId(): ?Parcours
    {
        return $this->parcoursId;
    }

    public function setParcoursId(?Parcours $parcoursId): self
    {
        $this->parcoursId = $parcoursId;

        return $this;
    }

    public function getUserId(): ?Users
    {
        return $this->userId;
    }

    public function setUserId(?Users $userId): self
    {
        $this->userId = $userId;

        return $this;
    }

    public function getNbPersonnes(): ?int
    {
        return $this->nbPersonnes;
    }

    public function setNbPersonnes(int $nbPersonnes): self
    {
        $this->nbPersonnes = $nbPersonnes;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getListVentes(): ?Ventes
    {
        return $this->listVentes;
    }

    public function setListVentes(Ventes $listVentes): self
    {
        $this->listVentes = $listVentes;

        // set the owning side of the relation if necessary
        if ($listVentes->getReservationId() !== $this) {
            $listVentes->setReservationId($this);
        }

        return $this;
    }

    /**
     * @return Collection|Options[]
     */
    public function getListOptions(): Collection
    {
        return $this->listOptions;
    }

    public function addListOption(Options $listOption): self
    {
        if (!$this->listOptions->contains($listOption)) {
            $this->listOptions[] = $listOption;
        }

        return $this;
    }

    public function removeListOption(Options $listOption): self
    {
        if ($this->listOptions->contains($listOption)) {
            $this->listOptions->removeElement($listOption);
        }

        return $this;
    }
}
