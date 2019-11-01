<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
     * @ORM\OneToMany(targetEntity="App\Entity\Area", mappedBy="empresa", orphanRemoval=true)
     */
    private $areas;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Credencial", mappedBy="empresa", orphanRemoval=true)
     */
    private $credencial;

    public function __construct()
    {
        $this->areas = new ArrayCollection();
        $this->credencial = new ArrayCollection();
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

    /**
     * @return Collection|Area[]
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(Area $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas[] = $area;
            $area->setEmpresa($this);
        }

        return $this;
    }

    public function removeArea(Area $area): self
    {
        if ($this->areas->contains($area)) {
            $this->areas->removeElement($area);
            // set the owning side to null (unless already changed)
            if ($area->getEmpresa() === $this) {
                $area->setEmpresa(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Credencial[]
     */
    public function getCredencial(): Collection
    {
        return $this->credencial;
    }

    public function addCredencial(Credencial $credencial): self
    {
        if (!$this->credencial->contains($credencial)) {
            $this->credencial[] = $credencial;
            $credencial->setEmpresa($this);
        }

        return $this;
    }

    public function removeCredencial(Credencial $credencial): self
    {
        if ($this->credencial->contains($credencial)) {
            $this->credencial->removeElement($credencial);
            // set the owning side to null (unless already changed)
            if ($credencial->getEmpresa() === $this) {
                $credencial->setEmpresa(null);
            }
        }

        return $this;
    }
}
