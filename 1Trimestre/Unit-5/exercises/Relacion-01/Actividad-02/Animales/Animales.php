<?php

class Animal {
    protected String $name;
    protected String $race;
    protected String $weight;
    protected String $color;

    public function __construct(String $name, $race, $weight, $color) {
        if (strlen($name) > 21) {
            return 'El nombre del perro tiene que tener un tamanio maximo de 21.';
        }

        $this->name = $name;
        $this->race = $race;
        $this->weight = $weight;
        $this->color = $color;
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
        echo "";
    }

    public function liveInWater(): bool {
        return false;
    }

    public function mostrar_propiedades(): void {
        echo $this->__toString();
    }

    public function __toString(): String {
        return "el tamaño del animal es $this->weight, su color $this->color, su raza $this->race y su nombre:$this->name.<br/>";
    }
}