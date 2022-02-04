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
    /**
     * This property is a id that represents this pedido
     * @var int $id
     */
    public $id;

    /**
     * This property is a id that represents the user for this pedido
     * @var int $usuario_id
     * @link \src\models\Usuarios for more model information
     */
    public $usuario_id;

    /**
     * This property represent the provincia for this pedido
     * @var string $provincia
     */
    public $provincia;

    /**
     * This property represent the localidad for this pedido
     * @var string $localidad
     */
    public $localidad;

    /**
     * This property represent the direccion for this pedido
     * @var string $direccion
     */
    public $direccion;

    /**
     * This property is the sum of all products with units cost
     * 
     * Formule:
     *  ($product->price * $units) + ...
     * @var float $coste
     */
    public $coste;

    /**
     * This property is the pedido state
     * Normaly it will be:
     *  - Packaging
     *  - Enviado
     *  - Llegando
     *  - Recivido
     * @var string $estado
     */
    public $estado;

    /**
     * This property is the date when this pedido was created with format: d-m-Y
     * @var DateTime $fecha
     */
    public $fecha;
    
    /**
     * This property is the time when this pedido was created with format: h:m:s
     * @var DateTime $hora
     */
    public $hora;

    /**
     * This property represent the nullable Usuarios object
     * @var ?Usuarios $usuario
     */
    public ?Usuarios $usuario = null;

    /**
     * This property represent the list on lines that belong to this pedido
     * @var Array<LineasPedidos> $lineas
     */
    public Array $lineas = [];

    public function __construct() {
    }

    /**
     * Add a product to this pedido converting this into {@link \src\models\LineasPedidos}
     * @param Productos $product The product that you want to add to this pedido
     * @link \src\models\Productos for more model information
     */
    public function add(Productos $product): void {
        $lineaPedido = new LineasPedidos();
        $lineaPedido->setProducto($product);
        $this->lineas[$product->id] = $lineaPedido;
        $this->calcCoste();
    }

    /**
     * Change the units of a product in this pedido
     * @param int $productID The product id that represent the searched product
     * @param int $unidades The new product units amount
     */
    public function set($productID, int $unidades): void {
        if (isset($this->lineas[$productID])) {
            $this->lineas[$productID]->unidades = $unidades;
        }
        $this->calcCoste();
    }

    /**
     * Remove a product from this pedidos
     * @param int $productID The product id that represent the searched product
     */
    public function remove($productID): void {
        unset($this->lineas[$productID]);
        $this->calcCoste();
    }

    /**
     * Get the value of lineas
     * @return Array<LineasPedidos>
     */
    public function getLineas(): Array {
        return $this->lineas;
    }

    /**
     * Set the value of lineas
     * @param Array<LineasPedidos> $lineas new lines for this pedido
     */
    public function setLineas($lineas): void {
        foreach ($lineas as $linea) {
            $linea->pedido_id = $this->id;
        }
        $this->lineas = $lineas;
        $this->calcCoste();
    }

    /**
     * Get the user of this pedido
     * @return ?Usuarios the usuario of this pedidos
     * @link \src\models\Productos for more model information
     */
    public function getUsuario(): ?Usuarios {
        return $this->usuario;
    }

    /**
     * Set the user of this pedido
     * @param ?Usuarios $usuario the usuario of this pedidos
     * @link \src\models\Productos for more model information
     */
    public function setUsuario(?Usuarios $usuario): void {
        $this->usuario = $usuario;
    }

    /**
     * Calculate the total cost of this pedido, this method is called when some property changes undirectly
     */
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