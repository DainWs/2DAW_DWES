<?php
namespace examples\namespaces\models\tasks;
class NormalTask {
    private String $nombre;
    public function __construct(String $nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre(): String
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */ 
    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }
}