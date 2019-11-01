<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CredencialRepository")
 */
class Credencial
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activa;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enUso;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Empresa", inversedBy="credencial")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Estado", inversedBy="credencials")
     * @ORM\JoinColumn(nullable=false)
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visita", mappedBy="credencial")
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

    public function getActiva(): ?bool
    {
        return $this->activa;
    }

    public function setActiva(bool $activa): self
    {
        $this->activa = $activa;

        return $this;
    }

    public function getEnUso(): ?bool
    {
        return $this->enUso;
    }

    public function setEnUso(bool $enUso): self
    {
        $this->enUso = $enUso;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getEstado(): ?Estado
    {
        return $this->estado;
    }

    public function setEstado(?Estado $estado): self
    {
        $this->estado = $estado;

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
            $visita->setCredencial($this);
        }

        return $this;
    }

    public function removeVisita(Visita $visita): self
    {
        if ($this->visitas->contains($visita)) {
            $this->visitas->removeElement($visita);
            // set the owning side to null (unless already changed)
            if ($visita->getCredencial() === $this) {
                $visita->setCredencial(null);
            }
        }

        return $this;
    }
}
