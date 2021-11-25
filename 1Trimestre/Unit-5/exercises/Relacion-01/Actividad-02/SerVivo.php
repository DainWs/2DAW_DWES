<?php

abstract class SerVivo {
    protected bool $isAlive;
    protected int $age;

    public function isAlive(): bool {
        return $this->isAlive();
    }

    public function getAge(): int {
        return $this->age;
    }

    abstract function nacer(): void;
    abstract function crecer(): void;
    abstract function morir(): void;
}