<?php 

namespace src\models;

class Pedidos {
    public $id;
    public $usuario_id;
    public string $provincia;
    public string $localidad;
    public string $direccion;
    public $coste;
    public $estado;
    public $fecha;
    public $hora;

    public ?Usuarios $usuario = null;
    public Array $lineas = [];

    public function __construct() {
    }

    public function add(Productos $product): void {
        $lineaPedido = new LineasPedidos();
        $lineaPedido->setProducto($product);
        $this->lineas[$product->id] = $lineaPedido;
        $this->calcCoste();
    }

    public function set($productID, int $unidades): void {
        if (isset($this->lineas[$productID])) {
            $this->lineas[$productID]->unidades = $unidades;
        }
        $this->calcCoste();
    }

    public function remove($productID): void {
        unset($this->lineas[$productID]);
        $this->calcCoste();
    }

    /**
     * Get the value of lineas
     * @return Array
     */
    public function getLineas(): Array {
        return $this->lineas;
    }

    public function setLineas($lineas) {
        foreach ($lineas as $linea) {
            $linea->pedido_id = $this->id;
        }
        $this->lineas = $lineas;
    }

    public function getUsuario(): ?Usuarios {
        return $this->usuario;
    }

    public function setUsuario(?Usuarios $usuario): void {
        $this->usuario = $usuario;
    }

    public function calcCoste(): void {
        $costeCarrito = 0.0;
        foreach ($this->lineas as $linea) {
            $product = $linea->getProducto();
            $oferta = $product->oferta/100;
            $precio = $product->precio*$oferta;
            $costeCarrito += $precio*$linea->unidades;
        }
        $this->coste = $costeCarrito;
    }
}