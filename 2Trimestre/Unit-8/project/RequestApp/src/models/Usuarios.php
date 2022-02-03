<?php 

namespace src\models;

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
     * This property is the email of the usuario
     * @var string $email
     */
    public $email;

    /**
     * This property is the password of the usuario
     * @var string $password
     */
    public $password;

    /**
     * This property is the id that represent the Roles of this usuario
     * @var string $rol
     * @link \src\domain\Roles
     */
    public $rol;
}