<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OptionsRepository")
 * @ApiResource
 */
class Options
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $nomOptions;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $type;

    /**
     * @ORM\Column(type="text")
     */
    private $descriptionOptions;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $etat;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Materiels")
     */
    private $listMateriels;

    public function __construct()
    {
        $this->listMateriels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomOptions(): ?string
    {
        return $this->nomOptions;
    }

    public function setNomOptions(string $nomOptions): self
    {
        $this->nomOptions = $nomOptions;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDescriptionOptions(): ?string
    {
        return $this->descriptionOptions;
    }

    public function setDescriptionOptions(string $descriptionOptions): self
    {
        $this->descriptionOptions = $descriptionOptions;

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

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * @return Collection|Materiels[]
     */
    public function getListMateriels(): Collection
    {
        return $this->listMateriels;
    }

    public function addListMateriel(Materiels $listMateriel): self
    {
        if (!$this->listMateriels->contains($listMateriel)) {
            $this->listMateriels[] = $listMateriel;
        }

        return $this;
    }

    public function removeListMateriel(Materiels $listMateriel): self
    {
        if ($this->listMateriels->contains($listMateriel)) {
            $this->listMateriels->removeElement($listMateriel);
        }

        return $this;
    }
}
