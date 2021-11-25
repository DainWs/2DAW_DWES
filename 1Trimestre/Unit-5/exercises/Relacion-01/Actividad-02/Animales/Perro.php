<?php

class Perro extends Animal {
    public function __construct(String $name, $race, $weight, $color) {
        parent::__construct($name, $race, $weight, $color);
    }

    public function speak(): void {
        echo "guaw";
    }

    public function __toString(): String {
        return "el tamaño del perro es $this->weight, su color $this->color, su raza $this->race y su nombre:$this->name.<br/>";
    }
}