<?php 

namespace src\models;

/**
 * The model class that represents rutes
 */
class Ruta {
    public int $id;
    public String $titulo;
    public String $descripcion;
    public int $desnivel;
    public float $distancia;
    public String $notas;
    public int $dificultad;

    public function __construct() {
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titulo
     */ 
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */ 
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of desnivel
     */ 
    public function getDesnivel()
    {
        return $this->desnivel;
    }

    /**
     * Set the value of desnivel
     *
     * @return  self
     */ 
    public function setDesnivel($desnivel)
    {
        $this->desnivel = $desnivel;

        return $this;
    }

    /**
     * Get the value of distancia
     */ 
    public function getDistancia()
    {
        return $this->distancia;
    }

    /**
     * Set the value of distancia
     *
     * @return  self
     */ 
    public function setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }

    /**
     * Get the value of notas
     */ 
    public function getNotas()
    {
        return $this->notas;
    }

    /**
     * Set the value of notas
     *
     * @return  self
     */ 
    public function setNotas($notas)
    {
        $this->notas = $notas;

        return $this;
    }

    /**
     * Get the value of dificultad
     */ 
    public function getDificultad()
    {
        return $this->dificultad;
    }

    /**
     * Set the value of dificultad
     *
     * @return  self
     */ 
    public function setDificultad($dificultad)
    {
        $this->dificultad = $dificultad;

        return $this;
    }
}