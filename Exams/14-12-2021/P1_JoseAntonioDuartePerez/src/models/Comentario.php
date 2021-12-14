<?php 

namespace src\models;

use DateTime;

/**
 * The model class that represents comments
 */
class Comentario {
    public function __construct() {
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id){
        $this->id = $id;
    }

    /**
     * Get the value of id_ruta
     */ 
    public function getId_ruta(){
        return $this->id_ruta;
    }

    /**
     * Set the value of id_ruta
     *
     * @return  self
     */ 
    public function setId_ruta($id_ruta){
        $this->id_ruta = $id_ruta;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre(){
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha(){
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    /**
     * Get the value of texto
     */ 
    public function getTexto(){
        return $this->texto;
    }

    /**
     * Set the value of texto
     *
     * @return  self
     */ 
    public function setTexto($texto){
        $this->texto = $texto;
    }
}