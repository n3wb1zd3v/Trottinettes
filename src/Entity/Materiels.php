<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterielsRepository")
 * @ApiResource
 */
class Materiels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nomMateriel;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $urlImage;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Produits", mappedBy="materielId", orphanRemoval=true)
     */
    private $listProduits;

    public function __construct()
    {
        $this->listProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMateriel(): ?string
    {
        return $this->nomMateriel;
    }

    public function setNomMateriel(string $nomMateriel): self
    {
        $this->nomMateriel = $nomMateriel;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->urlImage;
    }

    public function setUrlImage(?string $urlImage): self
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * @return Collection|Produits[]
     */
    public function getListProduits(): Collection
    {
        return $this->listProduits;
    }

    public function addListProduit(Produits $listProduit): self
    {
        if (!$this->listProduits->contains($listProduit)) {
            $this->listProduits[] = $listProduit;
            $listProduit->setMaterielId($this);
        }

        return $this;
    }

    public function removeListProduit(Produits $listProduit): self
    {
        if ($this->listProduits->contains($listProduit)) {
            $this->listProduits->removeElement($listProduit);
            // set the owning side to null (unless already changed)
            if ($listProduit->getMaterielId() === $this) {
                $listProduit->setMaterielId(null);
            }
        }

        return $this;
    }
}
