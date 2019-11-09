<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ParcoursRepository")
 */
class Parcours
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nomParcours;

    /**
     * @ORM\Column(type="time")
     */
    private $tempsParcours;

    /**
     * @ORM\Column(type="time")
     */
    private $tempsGlobal;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionParcours;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="listParcours")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieId;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ImagesParcours", mappedBy="parcoursId", orphanRemoval=true)
     */
    private $listImages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="parcoursId")
     */
    private $listReservations;

    public function __construct()
    {
        $this->listImages = new ArrayCollection();
        $this->listReservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomParcours(): ?string
    {
        return $this->nomParcours;
    }

    public function setNomParcours(string $nomParcours): self
    {
        $this->nomParcours = $nomParcours;

        return $this;
    }

    public function getTempsParcours(): ?\DateTimeInterface
    {
        return $this->tempsParcours;
    }

    public function setTempsParcours(\DateTimeInterface $tempsParcours): self
    {
        $this->tempsParcours = $tempsParcours;

        return $this;
    }

    public function getTempsGlobal(): ?\DateTimeInterface
    {
        return $this->tempsGlobal;
    }

    public function setTempsGlobal(\DateTimeInterface $tempsGlobal): self
    {
        $this->tempsGlobal = $tempsGlobal;

        return $this;
    }

    public function getDescriptionParcours(): ?string
    {
        return $this->descriptionParcours;
    }

    public function setDescriptionParcours(?string $descriptionParcours): self
    {
        $this->descriptionParcours = $descriptionParcours;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getCategorieId(): ?Categories
    {
        return $this->categorieId;
    }

    public function setCategorieId(?Categories $categorieId): self
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * @return Collection|ImagesParcours[]
     */
    public function getListImages(): Collection
    {
        return $this->listImages;
    }

    public function addListImage(ImagesParcours $listImage): self
    {
        if (!$this->listImages->contains($listImage)) {
            $this->listImages[] = $listImage;
            $listImage->setParcoursId($this);
        }

        return $this;
    }

    public function removeListImage(ImagesParcours $listImage): self
    {
        if ($this->listImages->contains($listImage)) {
            $this->listImages->removeElement($listImage);
            // set the owning side to null (unless already changed)
            if ($listImage->getParcoursId() === $this) {
                $listImage->setParcoursId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getListReservations(): Collection
    {
        return $this->listReservations;
    }

    public function addListReservation(Reservations $listReservation): self
    {
        if (!$this->listReservations->contains($listReservation)) {
            $this->listReservations[] = $listReservation;
            $listReservation->setParcoursId($this);
        }

        return $this;
    }

    public function removeListReservation(Reservations $listReservation): self
    {
        if ($this->listReservations->contains($listReservation)) {
            $this->listReservations->removeElement($listReservation);
            // set the owning side to null (unless already changed)
            if ($listReservation->getParcoursId() === $this) {
                $listReservation->setParcoursId(null);
            }
        }

        return $this;
    }
}
