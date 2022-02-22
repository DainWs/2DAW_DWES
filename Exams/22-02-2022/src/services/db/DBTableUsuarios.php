<?php

namespace exam\src\services\db;

use DBTable;
use Exception;
use PDO;
use exam\src\models\Usuarios;

/**
 * Esta clase representa la tabla Usuarios de la base de datos,
 * hay que resaltar que algunos metodos no tendran comentarios dado 
 * que ya los heredan de los metodos del padre.
 */
class DBTableUsuarios extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM usuarios WHERE nombre LIKE '%$name%' ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Usuarios::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        return $this->queryWhere('usuarios', 'id', $id, Usuarios::class);
    }

    /**
     * Found user in db by email
     * @param $value the user email
     * @return array|false array if all was success, otherwise false
     */
    public function queryWhereUsername($value): array|false {
        return $this->queryWhere('usuarios', 'nombre', $value, Usuarios::class);
    }

    public function insert($usuario): bool {
        return false;
    }
    
    public function update($usuario): bool {
        return false;
    }

    public function delete($id): bool {
        return false;
    }

    public function deleteWhere($id): bool {
        return true;
    }

}