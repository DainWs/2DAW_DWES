<?php

class Ballena extends Animal {
    public function __construct(String $name, $weight, $color) {
        parent::__construct($name, 'Ballena', $weight, $color);
    }

    public function speak(): void {
        echo "uuuuuuuuuuuuuuummmmmmmmm";
    }

    public function liveInWater(): bool {
        return true;
    }

    public function __toString(): String {
        return "el tamaño de la ballena es $this->weight, su color $this->color, su raza $this->race y su nombre:$this->name.<br/>";
    }
}