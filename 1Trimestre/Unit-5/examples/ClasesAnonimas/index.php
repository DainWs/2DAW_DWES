<?php

interface Datos{
    public function detalle(String $nombre): String;
}

class Empresa {
    private Datos $razonSocial;

    /**
     * Get the value of razonSocial
     */ 
    public function getRazonSocial(): Datos {
        return $this->razonSocial;
    }

    /**
     * Set the value of razonSocial
     */ 
    public function setRazonSocial(Datos $razonSocial): void
    {
        $this->razonSocial = $razonSocial;
    }

    public function __toString() {
        return $this->razonSocial->detalle("Alvaro");
    }
}

$empresa = new Empresa();
$empresa->setRazonSocial(new class implements Datos {
        public function detalle(String $nombre): String {
            return "hola $nombre.";
        }
    }
);
echo $empresa->__toString();