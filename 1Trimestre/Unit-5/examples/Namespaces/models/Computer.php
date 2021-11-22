<?php
namespace examples\namespaces\models;

use examples\namespaces\interfaces\CPUMachine;

abstract class Computer implements CPUMachine {
    private int $energy = 0;

    protected function setEnergy(int $energy): void {
        $this->energy += $energy;
    }

    protected function consumeEnergy(int $energy): bool {
        $result = false;
        if ($this->energy >= $energy) {
            $this->energy -= $energy;
            $result = true;
        }
        return $result;
    }

    abstract function getInformation(): String;
}