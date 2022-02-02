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
    public $id;
    public $categoria_id;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $oferta;
    public $fecha;
    public $imagen;
}