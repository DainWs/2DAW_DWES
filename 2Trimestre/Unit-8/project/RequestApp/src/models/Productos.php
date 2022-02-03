<?php 

namespace src\models;

/**
 * El modelo Productos representa una tupla de la tabla Productos en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 */
class Productos {
    /**
     * This property is the id that represent this product
     * @var int $id
     */
    public $id;

    /**
     * This property is the categoria_id that represent the category of this product
     * @var int $categoria_id
     */
    public $categoria_id;

    /**
     * This property is the name of this product
     * @var string $nombre
     */
    public $nombre;

    /**
     * This property is the description of this product
     * @var string $descripcion
     */
    public $descripcion;

    /**
     * This property is the precio of this product
     * @var float $precio
     */
    public $precio;

    /**
     * This property is the stock of this product
     * @var int $stock
     */
    public $stock;

    /**
     * This property is the oferta of this product
     * @var int $oferta
     */
    public $oferta;

    /**
     * This property is the fecha in which the product was created
     * @var DateTime $fecha
     */
    public $fecha;

    /**
     * This property is the name of the image file of this product
     * @var string $imagen
     */
    public $imagen;

    /**
     * This property says if this product can be show as a 'buy resource'
     * @var bool $enventa
     */
    public $enventa;
}