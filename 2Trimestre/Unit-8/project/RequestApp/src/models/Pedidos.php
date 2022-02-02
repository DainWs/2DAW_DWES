<?php 

namespace src\models;

/**
 * El modelo Pedidos representa una tupla de la tabla Pedidos en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 * 
 * la primera y tercera especificacion no se aplica a la variable $usuario y $lineas, dado que esta no tiene que ver con la base de datos
 */
class Pedidos {
    public $id;
    public $usuario_id;
    public $provincia;
    public $localidad;
    public $direccion;
    public $coste;
    public $estado;
    public $fecha;
    public $hora;
    public $enventa;

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
        $this->calcCoste();
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