<?php

namespace App\Entity;

use App\Repository\LibrosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LibrosRepository::class)]
class Libros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 60)]
    private $titulo;

    #[ORM\Column(type: 'string', length: 25, nullable: true)]
    private $editorial;

    #[ORM\Column(type: 'string', length: 25, nullable: true)]
    private $autor;

    #[ORM\Column(type: 'string', length: 20)]
    private $genero;

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $pais;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nPaginas;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $year;

    #[ORM\Column(type: 'float')]
    private $precio;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getEditorial(): ?string
    {
        return $this->editorial;
    }

    public function setEditorial(?string $editorial): self
    {
        $this->editorial = $editorial;

        return $this;
    }

    public function getAutor(): ?string
    {
        return $this->autor;
    }

    public function setAutor(?string $autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getPais(): ?string
    {
        return $this->pais;
    }

    public function setPais(?string $pais): self
    {
        $this->pais = $pais;

        return $this;
    }

    public function getNPaginas(): ?int
    {
        return $this->nPaginas;
    }

    public function setNPaginas(?int $nPaginas): self
    {
        $this->nPaginas = $nPaginas;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(?\DateTimeInterface $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}
