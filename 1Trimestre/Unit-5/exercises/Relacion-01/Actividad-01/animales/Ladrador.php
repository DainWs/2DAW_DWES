<?php

class Ladrador {
    private String $name;
    private String $race;
    private String $weight;
    private String $color;

    public function __construct() {
        $this->name = 'Labrador';
        $this->race = 'Labrador';
        $this->weight = 60;
        $this->color = 'gray';
    }

    public function getName(): String {
        return $this->name;
    }

    public function setName(String $name): bool {
        if (strlen($name) > 21) {
            return false;
        }
        $this->name = $name.substr($name, 21);
        return true;
    }

    public function getRace() {
        return $this->race;
    }

    public function setRace($race) {
        $this->race = $race;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getColor() {
        return $this->color;
    }

    public function setColor($color) {
        $this->color = $color;
    }

    public function speak(): void {
        echo "guaw";
    }

    public function mostrar_propiedades(): void {
        echo $this->__toString();
    }

    public function __toString(): String {
        return "el tamaño del perro es $this->weight, su color $this->color, su raza $this->race y su nombre:$this->name.<br/>";
    }
}