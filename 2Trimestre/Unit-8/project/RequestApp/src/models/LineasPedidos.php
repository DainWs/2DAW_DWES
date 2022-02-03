<?php 

namespace src\models;

/**
 * El modelo Usuarios representa una tupla de la tabla Usuarios en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 */
class LineasPedidos {
    /**
     * This property is a id that represents this lineaPedido
     * @var int $id
     */
    public $id;

    /**
     * This property is a id that represents a Pedido
     * @link \src\models\Pedidos for more model information
     * @var int $pedido_id
     */
    public $pedido_id;

    /**
     * This property is a id that represents a Producto
     * @link \src\models\Productos for more model information
     * @var int $producto_id
     */
    public $producto_id;

    /**
     * This property is the unit count for the product
     * @var int $unidades
     */
    public $unidades;

    /**
     * This property represent the product name from $producto_id
     * @var string $nombreProducto
     */
    public $nombreProducto;

    /**
     * This property represent the product object, only avaible sometimes
     * @link \src\models\Productos for more model information
     */
    public ?Productos $producto;

    public function __construct() {
        $this->id = 0;
        $this->pedido_id = 0;
        $this->producto_id = 0;
        $this->unidades = 1;
    }

    /**
     * Get the product from this LineaPedido
     * @return ?Productos the product object for this LineaPedidos
     */
    public function getProducto(): ?Productos {
        return $this->producto;
    }

    /**
     * Set the product from this LineaPedido
     * @param Productos $producto the product object for this LineaPedidos
     */
    public function setProducto(Productos $producto): void {
        $this->producto = $producto;
        $this->producto_id = $producto->id;
    }
}