<?php

class Persona {
    // Atributos clase
    protected $nombre;
    protected $apellidos;
    protected $edad;

    // Constructor
    public function __construct($nombre, $apellidos, $edad) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->edad = $edad;
    }

    //Getters y Setters
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre): void {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    // metodos de informacion
    public function __toString() {
        return "Nombre: $this->nombre, $this->apellidos con edad : $this->edad";   
    }
}