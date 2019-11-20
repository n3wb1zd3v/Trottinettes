<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 * @ApiResource
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomCategorie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionCategorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Parcours", mappedBy="categorieId", orphanRemoval=true)
     */
    private $listParcours;

    public function __construct()
    {
        $this->listParcours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }

    public function setNomCategorie(string $nomCategorie): self
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    public function getDescriptionCategorie(): ?string
    {
        return $this->descriptionCategorie;
    }

    public function setDescriptionCategorie(?string $descriptionCategorie): self
    {
        $this->descriptionCategorie = $descriptionCategorie;

        return $this;
    }

    /**
     * @return Collection|Parcours[]
     */
    public function getListParcours(): Collection
    {
        return $this->listParcours;
    }

    public function addListParcour(Parcours $listParcour): self
    {
        if (!$this->listParcours->contains($listParcour)) {
            $this->listParcours[] = $listParcour;
            $listParcour->setCategorieId($this);
        }

        return $this;
    }

    public function removeListParcour(Parcours $listParcour): self
    {
        if ($this->listParcours->contains($listParcour)) {
            $this->listParcours->removeElement($listParcour);
            // set the owning side to null (unless already changed)
            if ($listParcour->getCategorieId() === $this) {
                $listParcour->setCategorieId(null);
            }
        }

        return $this;
    }
}
