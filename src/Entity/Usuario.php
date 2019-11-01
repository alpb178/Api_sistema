<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\UsuarioRepository")
 */
class Usuario
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
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ci;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cargo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $autoriza;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Rol", inversedBy="usuarios")
     */
    private $rol;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visita", mappedBy="usuario")
     */
    private $visitas;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Area", inversedBy="usuarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;

    public function __construct()
    {
        $this->rol = new ArrayCollection();
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

    public function getApellido(): ?string
    {
        return $this->apellido;
    }

    public function setApellido(string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCi(): ?string
    {
        return $this->ci;
    }

    public function setCi(string $ci): self
    {
        $this->ci = $ci;

        return $this;
    }

    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): self
    {
        $this->cargo = $cargo;

        return $this;
    }

    public function getAutoriza(): ?bool
    {
        return $this->autoriza;
    }

    public function setAutoriza(bool $autoriza): self
    {
        $this->autoriza = $autoriza;

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
     * @return Collection|Rol[]
     */
    public function getRol(): Collection
    {
        return $this->rol;
    }

    public function addRol(Rol $rol): self
    {
        if (!$this->rol->contains($rol)) {
            $this->rol[] = $rol;
        }

        return $this;
    }

    public function removeRol(Rol $rol): self
    {
        if ($this->rol->contains($rol)) {
            $this->rol->removeElement($rol);
        }

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
            $visita->setUsuario($this);
        }

        return $this;
    }

    public function removeVisita(Visita $visita): self
    {
        if ($this->visitas->contains($visita)) {
            $this->visitas->removeElement($visita);
            // set the owning side to null (unless already changed)
            if ($visita->getUsuario() === $this) {
                $visita->setUsuario(null);
            }
        }

        return $this;
    }

    public function getArea(): ?Area
    {
        return $this->area;
    }

    public function setArea(?Area $area): self
    {
        $this->area = $area;

        return $this;
    }
}
