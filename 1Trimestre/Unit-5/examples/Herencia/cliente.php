<?php

class Cliente extends Persona {

    private $tarjetaCredito;

    public function __construct($nombre, $apellidos, $edad, $tarjetaCredito) {
        parent::__construct($nombre, $apellidos, $edad);
        $this->tarjetaCredito = $tarjetaCredito;
    }

    public function getTarjeta() {
        return $this->tarjetaCredito;
    }

    public function setTarjeta($tarjetaCredito) {
        $this->tarjetaCredito = $tarjetaCredito;
    }
}