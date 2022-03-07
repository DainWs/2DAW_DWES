<?php

namespace src\services\db;

use DBTable;
use Exception;
use Monolog\Logger;
use PDO;
use src\models\Books;

/**
 * Esta clase representa la tabla Books de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableBooks extends DBTable {

    public function query(String $title = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $selectedTitle = "%$title%";
            $statement = parent::$connection->prepare("SELECT * FROM books WHERE titulo LIKE :title ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":title", $selectedTitle);
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Books::class);
        } catch(Exception $ex) {
            echo $ex->getMessage();
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }
    
    public function queryWith($id): array|false {
        return $this->queryWhere('books', 'id', $id, Books::class);
    }

    public function insert($book): bool {
        // Action not allowed
        return false;
    }
    
    public function update($book): bool {
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