<?php

namespace exam\src\services\db;

use DBTable;
use Exception;
use PDO;
use exam\src\models\Reservas;

/**
 * Esta clase representa la tabla Reservas de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableReservas extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM reservas");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Reservas::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        return $this->queryWhere('reservas', 'usuario_id', $id, Reservas::class);
    }

    public function insert($reserva): bool {
        $result = true;

        if ($reserva instanceof Reservas) {
            try {
                $statement = parent::$connection->prepare("INSERT INTO reservas VALUES (:usuario_id, :butaca_id)");
                $statement->bindParam(":usuario_id", $reserva->usuario_id);
                $statement->bindParam(":butaca_id", $reserva->butaca_id);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
                var_dump($ex->getMessage());
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($reserva): bool {
        return false;
    }

    public function delete($reserva): bool {
        $result = true;
        if ($reserva instanceof Reservas) {
            try {
                $statement = parent::$connection->prepare("DELETE FROM reservas WHERE usuario_id = :usuario_id AND butaca_id = :butaca_id");
                $statement->bindParam(":usuario_id", $reserva->usuario_id);
                $statement->bindParam(":butaca_id", $reserva->butaca_id);
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

    public function deleteWhere($id): bool {
        return true;
    }

}