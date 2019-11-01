<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\OrganismoRepository")
 */
class Organismo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $siglas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visita", mappedBy="organismo")
     */
    private $visitas;

    public function __construct()
    {
        $this->visitas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSiglas(): ?string
    {
        return $this->siglas;
    }

    public function setSiglas(string $siglas): self
    {
        $this->siglas = $siglas;

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * @return Collection|Visita[]
     */
    public function getVisitas(): Collection
    {
        return $this->visitas;
    }

    public function addVisita(Visita $visita): self
    {
        if (!$this->visitas->contains($visita)) {
            $this->visitas[] = $visita;
            $visita->setOrganismo($this);
        }

        return $this;
    }

    public function removeVisita(Visita $visita): self
    {
        if ($this->visitas->contains($visita)) {
            $this->visitas->removeElement($visita);
            // set the owning side to null (unless already changed)
            if ($visita->getOrganismo() === $this) {
                $visita->setOrganismo(null);
            }
        }

        return $this;
    }
}
