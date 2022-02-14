<?php

namespace App\Entity;

use App\Repository\PrestamosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestamosRepository::class)]
class Prestamos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Libros::class)]
    #[ORM\JoinColumn(nullable: false)]
    private $libro_id;

    #[ORM\ManyToOne(targetEntity: Usuarios::class, inversedBy: 'prestamos')]
    #[ORM\JoinColumn(nullable: false)]
    private $usuario_id;

    #[ORM\Column(type: 'datetime')]
    private $completionDate;

    #[ORM\Column(type: 'datetime')]
    private $maxDelayDate;

    #[ORM\Column(type: 'datetime')]
    private $returnDate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibroId(): ?Libros
    {
        return $this->libro_id;
    }

    public function setLibroId(?Libros $libro_id): self
    {
        $this->libro_id = $libro_id;

        return $this;
    }

    public function getUsuarioId(): ?Usuarios
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?Usuarios $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getCompletionDate(): ?\DateTimeInterface
    {
        return $this->completionDate;
    }

    public function setCompletionDate(\DateTimeInterface $completionDate): self
    {
        $this->completionDate = $completionDate;

        return $this;
    }

    public function getMaxDelayDate(): ?\DateTimeInterface
    {
        return $this->maxDelayDate;
    }

    public function setMaxDelayDate(\DateTimeInterface $maxDelayDate): self
    {
        $this->maxDelayDate = $maxDelayDate;

        return $this;
    }

    public function getReturnDate(): ?\DateTimeInterface
    {
        return $this->returnDate;
    }

    public function setReturnDate(\DateTimeInterface $returnDate): self
    {
        $this->returnDate = $returnDate;

        return $this;
    }
}
