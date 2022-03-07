<?php 

namespace src\models;

use DateTime;

/**
 * El modelo Usuarios representa una tupla de la tabla Usuarios en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 */
class Usuarios {
    /**
     * This property is the id that represent this usuario
     * @var int $id
     */
    public $id;

    /**
     * This property is the nombre of the usuario
     * @var string $nombre
     */
    public $nombre;

    /**
     * This property is the apellidos of the usuario
     * @var string $apellidos
     */
    public $apellidos;

    /**
     * This property is the dni of the usuario
     * @var string $dni
     */
    public $dni;

    /**
     * This property is the domicilio of the usuario
     * @var string $domicilio
     */
    public $domicilio = '';

    /**
     * This property is the poblacion of the usuario
     * @var string $poblacion
     */
    public $poblacion = '';

    /**
     * This property is the provincia of the usuario
     * @var string $provincia
     */
    public $provincia = '';

    /**
     * This property is the birthday of the usuario
     * @var datetime $birthday
     */
    public $birthday;

    /**
     * This property is the prestamos of the usuario
     * @var array $prestamos
     */
    public $prestamos = [];
}