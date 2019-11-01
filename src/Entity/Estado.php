<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EstadoRepository")
 */
class Estado
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
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Credencial", mappedBy="estado", orphanRemoval=true)
     */
    private $credencials;

    public function __construct()
    {
        $this->credencials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|Credencial[]
     */
    public function getCredencials(): Collection
    {
        return $this->credencials;
    }

    public function addCredencial(Credencial $credencial): self
    {
        if (!$this->credencials->contains($credencial)) {
            $this->credencials[] = $credencial;
            $credencial->setEstado($this);
        }

        return $this;
    }

    public function removeCredencial(Credencial $credencial): self
    {
        if ($this->credencials->contains($credencial)) {
            $this->credencials->removeElement($credencial);
            // set the owning side to null (unless already changed)
            if ($credencial->getEstado() === $this) {
                $credencial->setEstado(null);
            }
        }

        return $this;
    }
}
