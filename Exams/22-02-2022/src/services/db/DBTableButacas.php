<?php

namespace exam\src\services\db;

use DBTable;
use Exception;
use PDO;
use exam\src\models\Butacas;

/**
 * Esta clase representa la tabla Butacas de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableButacas extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM butacas");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Butacas::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        return $this->queryWhere('butacas', 'id', $id, Butacas::class);
    }

    public function queryOne($fila, $columna) {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM butacas WHERE fila = ? AND columna = ?");
            $statement->bindParam(1, $fila);
            $statement->bindParam(2, $columna);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Butacas::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function insert($butaca): bool {
        $result = true;

        if ($butaca instanceof Butacas) {
            try {
                $statement = parent::$connection->prepare("INSERT INTO butacas VALUES (:fila, :columna, :ocupada )");
                $statement->bindParam(":fila", $butaca->fila);
                $statement->bindParam(":columna", $butaca->columna);
                $statement->bindParam(":ocupada", $butaca->ocupada);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($butaca): bool {
        $result = true;
        if ($butaca instanceof Butacas) {
            try {
                $isOcupada = ($butaca->ocupada) ? 1 : 0;
                $statement = parent::$connection->prepare("UPDATE butacas SET ocupada = :ocupada WHERE fila = :fila AND columna = :columna");
                $statement->bindParam(":ocupada", $isOcupada);
                $statement->bindParam(":fila", $butaca->fila);
                $statement->bindParam(":columna", $butaca->columna);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                $result = false;
            }
        }
        return $result;
    }

    public function delete($id): bool {
        return false;
    }

    public function deleteWhere($id): bool {
        return true;
    }

}