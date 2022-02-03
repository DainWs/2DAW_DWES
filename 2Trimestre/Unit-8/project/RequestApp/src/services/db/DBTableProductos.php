<?php

namespace src\services\db;

use DBTable;
use Exception;
use Monolog\Logger;
use PDO;
use src\models\Productos;

/**
 * Esta clase representa la tabla Productos de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableProductos extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM productos WHERE enventa == 1 AND nombre LIKE '%$name%' ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Productos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $this->logger->log( $ex->getMessage(), Logger::WARNING);
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        return $this->queryWhere('productos', 'id', $id, Productos::class);
    }

    /**
     * Return a 'page' of limited object for a ajax request
     * @param $pageNum num of page
     * @param $limit limit of object for page
     * @param $order the column to sort by
     * @param $orderType the type of order, SQL_ORDER_ASC or SQL_ORDER_DES
     * @return array|false array si se realizo de forma correcta, y false en caso contrario
     */
    public function queryPage(int $pageNum = 0, int $limit = 10, $category = -1, String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        $fromRownum = $pageNum * $limit;
        $useCategory = ($category >= 0);
        if ($fromRownum >= 0) {
            try {
                $sql = "SELECT * FROM productos WHERE enventa = 1";
                $sql .= ($useCategory) ? " AND categoria_id = :categoryId" : '' ;
                $sql .= " ORDER BY :fieldOrder :orderType LIMIT $limit OFFSET $fromRownum";
                $statement = parent::$connection->prepare($sql);
                $statement->bindParam(":fieldOrder", $order);
                $statement->bindParam(":orderType", $orderType);
                if ($useCategory) {
                    $statement->bindParam(":categoryId", $category);
                }
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch(Exception $ex) {
                $this->errors = $ex->getMessage();
                $this->logger->log( $ex->getMessage(), Logger::WARNING);
                $result = false;
            }
        }
        return $result;
    }

    public function insert($producto): bool {
        $result = true;

        if ($producto instanceof Productos) {
            try {
                $fecha = date($producto->fecha->format('Y-m-d'));

                $statement = parent::$connection->prepare("INSERT INTO productos VALUES (:id, :categoria_id, :nombre, :descripcion, :precio, :stock, :oferta, :fecha, :imagen, :enventa)");
                $statement->bindParam(":id", $producto->id);
                $statement->bindParam(":categoria_id", $producto->categoria_id);
                $statement->bindParam(":nombre", $producto->nombre);
                $statement->bindParam(":descripcion", $producto->descripcion);
                $statement->bindParam(":precio", $producto->precio);
                $statement->bindParam(":stock", $producto->stock);
                $statement->bindParam(":oferta", $producto->oferta);
                $statement->bindParam(":fecha", $fecha);
                $statement->bindParam(":imagen", $producto->imagen);
                $statement->bindParam(":enventa", $producto->enventa);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $this->logger->log( $ex->getMessage(), Logger::WARNING);
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($producto): bool {
        $result = true;
        if ($producto instanceof Productos) {
            try {
                $sql = "UPDATE productos set";
                $counter = 0;
                if ($producto->categoria_id > -1) {
                    $sql .= " categoria_id=:categoria_id";
                    $counter++;
                }

                if (!empty($producto->nombre)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " nombre=:nombre";
                    $counter++;
                }

                if (!empty($producto->descripcion)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " descripcion=:descripcion";
                    $counter++;
                }

                if ($producto->precio > -1) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " precio=:precio";
                    $counter++;
                }

                if ($producto->stock > -1) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " stock=:stock";
                    $counter++;
                }

                if (!empty($producto->oferta)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " oferta=:oferta";
                    $counter++;
                }

                if (!empty($producto->fecha)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " fecha=:fecha";
                    $counter++;
                }

                if (!empty($producto->imagen)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " imagen=:imagen";
                    $counter++;
                }

                $sql .= " WHERE id=:id";

                $statement = parent::$connection->prepare($sql);
                
                if ($producto->categoria_id > -1) {
                    $statement->bindParam(":categoria_id", $producto->categoria_id);
                }

                if (!empty($producto->nombre)) {
                    $statement->bindParam(":nombre", $producto->nombre);
                }

                if (!empty($producto->descripcion)) {
                    $statement->bindParam(":descripcion", $producto->descripcion);
                }

                if ($producto->precio > -1) {
                    $statement->bindParam(":precio", $producto->precio);
                }

                if ($producto->stock > -1) {
                    $statement->bindParam(":stock", $producto->stock);
                }

                if (!empty($producto->oferta)) {
                    $statement->bindParam(":oferta", $producto->oferta);
                }

                if (!empty($producto->fecha)) {
                    $statement->bindParam(":fecha", $producto->fecha);
                }

                if (!empty($producto->imagen)) {
                    $statement->bindParam(":imagen", $producto->imagen);
                }

                $statement->bindParam(":id", $producto->id);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $this->logger->log( $ex->getMessage(), Logger::WARNING);
                $result = false;
            }
        }
        return $result;
    }

    public function delete($id): bool {
        $result = true;
        try {
            $statement = parent::$connection->prepare("UPDATE productos SET enventa = 0 WHERE id= :id");
            $statement->bindParam(":id", $id);
            parent::$connection->beginTransaction();
            $statement->execute();
            parent::$connection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $this->logger->log( $ex->getMessage(), Logger::WARNING);
            $result = false;
        }
        return $result;
    }

    public function deleteWhere($id): bool {
        return true;
    }

}