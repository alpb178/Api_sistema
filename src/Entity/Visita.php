<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\VisitaRepository")
 */
class Visita
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horaEntrada;

    /**
     * @ORM\Column(type="datetime")
     */
    private $horaSalida;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Organismo", inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $organismo;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Credencial", inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $credencial;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Visitante", inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $visitante;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Usuario", inversedBy="visitas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHoraEntrada(): ?\DateTimeInterface
    {
        return $this->horaEntrada;
    }

    public function setHoraEntrada(\DateTimeInterface $horaEntrada): self
    {
        $this->horaEntrada = $horaEntrada;

        return $this;
    }

    public function getHoraSalida(): ?\DateTimeInterface
    {
        return $this->horaSalida;
    }

    public function setHoraSalida(\DateTimeInterface $horaSalida): self
    {
        $this->horaSalida = $horaSalida;

        return $this;
    }

    public function getOrganismo(): ?Organismo
    {
        return $this->organismo;
    }

    public function setOrganismo(?Organismo $organismo): self
    {
        $this->organismo = $organismo;

        return $this;
    }

    public function getCredencial(): ?Credencial
    {
        return $this->credencial;
    }

    public function setCredencial(?Credencial $credencial): self
    {
        $this->credencial = $credencial;

        return $this;
    }

    public function getVisitante(): ?Visitante
    {
        return $this->visitante;
    }

    public function setVisitante(?Visitante $visitante): self
    {
        $this->visitante = $visitante;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

        return $this;
    }
}
