<?php

namespace App\Entity;

use App\Repository\UsuariosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuariosRepository::class)]
class Usuarios
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 15)]
    private $nombre;

    #[ORM\Column(type: 'string', length: 25, nullable: true)]
    private $apellidos;

    #[ORM\Column(type: 'string', length: 9)]
    private $dni;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $domicilio;

    #[ORM\Column(type: 'string', length: 30, nullable: true)]
    private $poblacion;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $provincia;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $birthday;

    #[ORM\OneToMany(mappedBy: 'usuario_id', targetEntity: Prestamos::class, orphanRemoval: true)]
    private $prestamos;

    public function __construct()
    {
        $this->prestamos = new ArrayCollection();
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

    public function setApellidos(?string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): self
    {
        $this->dni = $dni;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(?string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }

    public function getPoblacion(): ?string
    {
        return $this->poblacion;
    }

    public function setPoblacion(?string $poblacion): self
    {
        $this->poblacion = $poblacion;

        return $this;
    }

    public function getProvincia(): ?string
    {
        return $this->provincia;
    }

    public function setProvincia(?string $provincia): self
    {
        $this->provincia = $provincia;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * @return Collection|Prestamos[]
     */
    public function getPrestamos(): Collection
    {
        return $this->prestamos;
    }

    public function addPrestamo(Prestamos $prestamo): self
    {
        if (!$this->prestamos->contains($prestamo)) {
            $this->prestamos[] = $prestamo;
            $prestamo->setUsuarioId($this);
        }

        return $this;
    }

    public function removePrestamo(Prestamos $prestamo): self
    {
        if ($this->prestamos->removeElement($prestamo)) {
            // set the owning side to null (unless already changed)
            if ($prestamo->getUsuarioId() === $this) {
                $prestamo->setUsuarioId(null);
            }
        }

        return $this;
    }
}
