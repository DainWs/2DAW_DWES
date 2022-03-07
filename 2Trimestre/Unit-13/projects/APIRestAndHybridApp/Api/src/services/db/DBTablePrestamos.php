<?php

namespace src\services\db;

use DBTable;
use Exception;
use Monolog\Logger;
use PDO;
use src\models\Prestamos;

/**
 * Esta clase representa la tabla Prestamos de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTablePrestamos extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM prestamos ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Prestamos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM prestamos WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Prestamos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWhereUser($id): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM prestamos WHERE usuario_id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Prestamos::class);

            $booksTable = new DBTableBooks();
            foreach ($result as $key => $prestamo) {
                $result[$key]->libro = $booksTable->queryWith($prestamo->libro_id)[0];
            }
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function insert($prestamo): bool {
        $result = true;

        if ($prestamo instanceof Prestamos) {
            try {
                $completionDate = date($prestamo->completionDate->format('Y-m-d'));
                $maxDelayDate = date($prestamo->maxDelayDate->format('Y-m-d'));
                $returnDate = date($prestamo->returnDate->format('Y-m-d'));

                $statement = parent::$connection->prepare("INSERT INTO prestamos VALUES (:id, :libro_id, :usuario_id, :completionDate, :maxDelayDate, :returnDate)");
                $statement->bindParam(":id", $prestamo->id);
                $statement->bindParam(":libro_id", $prestamo->libro_id);
                $statement->bindParam(":usuario_id", $prestamo->usuario_id);
                $statement->bindParam(":completionDate", $completionDate);
                $statement->bindParam(":maxDelayDate", $maxDelayDate);
                $statement->bindParam(":returnDate", $returnDate);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                echo $ex->getMessage();
                $this->errors = $ex->getMessage();
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($prestamo): bool {
        // Action not allowed
        return false;
    }

    public function delete($id): bool {
        // Action not allowed
        return false;
    }

    public function deleteWhere($id): bool {
        // Action not allowed
        return true;
    }

}