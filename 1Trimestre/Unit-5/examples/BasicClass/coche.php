<?php

class Coche {
    
    // Atributos clase
    protected $color;
    protected $marca;
    protected $modelo;
    protected $velocidad;
    protected $caballos;
    protected $plazas;

    // Constructor
    public function __construct($color, $marca, $modelo, $velocidad, $caballos, $plazas) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballos = $caballos;
        $this->plazas = $plazas;
    }

    //Getters y Setters
    public function getColor() {
        return $this->color;
    }

    public function setColor($color): void {
        $this->color = $color;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }

    public function getVelocidad() {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad;
    }

    public function getCaballos() {
        return $this->caballos;
    }

    public function setCaballos($caballos) {
        $this->caballos = $caballos;
    }

    public function getPlazas() {
        return $this->plazas;
    }

    public function setPlazas($plazas) {
        $this->plazas = $plazas;
    }

    // metodos de usabilidad
    public function accelerar() {
        $this->velocidad += 5;
    }

    public function frenar() {
        $this->velocidad--;
    }

    // metodos de informacion
    public function __toString()
    {
        return "Marca: $this->marca\n" +
            "Modelo: $this->modelo\n" +
            "Caballos: $this->caballos\n" +
            "Plazas: $this->plazas";   
    }
}