<?php 

namespace src\models;

/**
 * El modelo Libros representa una tupla de la tabla Libros en la base de datos
 * ¡¡¡Importante!!!
 * - En estas clases, no se especifican tipos de datos a las variables, para evitar algunos problemas con base de datos y demás
 * - En estas clases, las propiedades son publicas para poder serializar la maxima cantidad de datos, y poder guardarlos mas facilmente en $_SESSION
 * - Dadas las anteriores situaciones, no se han generado setter o getters para estos modelos, ya que no son necesarios.
 */
class Books {
    /**
     * This property is the id that represent this book
     * @var int $id
     */
    public $id;

    /**
     * This property is the title of this book
     * @var string $titulo
     */
    public $titulo;

    /**
     * This property is the editorial of this book
     * @var string $editorial
     */
    public $editorial;

    /**
     * This property is the autor of this book
     * @var string $autor
     */
    public $autor;

    /**
     * This property is the genero of this book
     * @var string $genero
     */
    public $genero;

    /**
     * This property is the nPaginas of this book
     * @var int $nPaginas
     */
    public $nPaginas;

    /**
     * This property is the year of this book
     * @var datetime $year
     */
    public $year;

    /**
     * This property is the precio of this book
     * @var float $precio
     */
    public $precio;
}