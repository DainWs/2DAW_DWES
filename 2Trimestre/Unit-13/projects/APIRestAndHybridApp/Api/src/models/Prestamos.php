<?php 

namespace src\models;

/**
 * El modelo Prestamos representa una tupla de la tabla Prestamos en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 */
class Prestamos {
    /**
     * This property is a id that represents this prestamo
     * @var int $id
     */
    public $id;

    /**
     * This property is a id that represents the libro for this prestamo
     * @var int $libro_id
     * @link \src\models\Books for more model information
     */
    public $libro_id;

    /**
     * This property is a id that represents the user for this prestamo
     * @var int $usuario_id
     * @link \src\models\Usuarios for more model information
     */
    public $usuario_id;

    /**
     * This property represent the completionDate for this prestamo
     * @var datetime $completionDate
     */
    public $completionDate;

    /**
     * This property represent the maxDelayDate for this prestamo
     * @var datetime $maxDelayDate
     */
    public $maxDelayDate;

    /**
     * This property represent the returnDate for this prestamo
     * @var datetime $returnDate
     */
    public $returnDate;

    /**
     * This property is a object that represents the libro for this prestamo
     * @var Books $libro
     * @link \src\models\Books for more model information
     */
    public $libro;
}