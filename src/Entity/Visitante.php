<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\VisitanteRepository")
 */
class Visitante
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
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pasaporte;

    /**
     * @ORM\Column(type="string", length=11, nullable=true)
     */
    private $CI;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carnetMilitar;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visita", mappedBy="visitante")
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

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getPasaporte(): ?string
    {
        return $this->pasaporte;
    }

    public function setPasaporte(?string $pasaporte): self
    {
        $this->pasaporte = $pasaporte;

        return $this;
    }

    public function getCI(): ?string
    {
        return $this->CI;
    }

    public function setCI(?string $CI): self
    {
        $this->CI = $CI;

        return $this;
    }

    public function getCarnetMilitar(): ?string
    {
        return $this->carnetMilitar;
    }

    public function setCarnetMilitar(string $carnetMilitar): self
    {
        $this->carnetMilitar = $carnetMilitar;

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
            $visita->setVisitante($this);
        }

        return $this;
    }

    public function removeVisita(Visita $visita): self
    {
        if ($this->visitas->contains($visita)) {
            $this->visitas->removeElement($visita);
            // set the owning side to null (unless already changed)
            if ($visita->getVisitante() === $this) {
                $visita->setVisitante(null);
            }
        }

        return $this;
    }
}
