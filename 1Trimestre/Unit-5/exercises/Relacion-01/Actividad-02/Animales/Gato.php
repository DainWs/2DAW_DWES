<?php

class Gato extends Animal {
    public function __construct(String $name, $race, $weight, $color) {
        parent::__construct($name, $race, $weight, $color);
    }

    public function speak(): void {
        echo "miaw";
    }

    public function __toString(): String {
        return "el tamaño del gato es $this->weight, su color $this->color, su raza $this->race y su nombre:$this->name.<br/>";
    }
}