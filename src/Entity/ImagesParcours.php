<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImagesParcoursRepository")
 * @ApiResource
 */
class ImagesParcours
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
    private $nomImage;

    /**
     * @ORM\Column(type="string", length=55)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\PArcours", inversedBy="listImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $parcoursId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomImage(): ?string
    {
        return $this->nomImage;
    }

    public function setNomImage(string $nomImage): self
    {
        $this->nomImage = $nomImage;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(?string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getParcoursId(): ?PArcours
    {
        return $this->parcoursId;
    }

    public function setParcoursId(?PArcours $parcoursId): self
    {
        $this->parcoursId = $parcoursId;

        return $this;
    }
}
