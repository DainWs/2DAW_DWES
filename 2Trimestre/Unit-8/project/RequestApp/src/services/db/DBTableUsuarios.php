<?php

namespace src\services\db;

use DBTable;
use Exception;
use PDO;
use src\models\Usuarios;

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
     */
    public function queryWhereEmail($value): array|false {
        return $this->queryWhere('usuarios', 'email', $value, Usuarios::class);
    }

    public function insert($usuario): bool {
        $result = true;

        if ($usuario instanceof Usuarios) {
            try {
                $encryptedPass = md5($usuario->password);

                $statement = parent::$connection->prepare("INSERT INTO usuarios VALUES (:id, :nombre, :apellidos, :email, :pass, :rol)");
                $statement->bindParam(":id", $usuario->id);
                $statement->bindParam(":nombre", $usuario->nombre);
                $statement->bindParam(":apellidos", $usuario->apellidos);
                $statement->bindParam(":email", $usuario->email);
                $statement->bindParam(":pass", $encryptedPass);
                $statement->bindParam(":rol", $usuario->rol);
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
    
    public function update($usuario): bool {
        $result = true;
        if ($usuario instanceof Usuarios) {
            try {
                $sql = "UPDATE usuarios set";
                $counter = 0;
                if (!empty($usuario->nombre)) {
                    $sql .= " nombre=:nombre";
                    $counter++;
                }

                if (!empty($usuario->apellidos)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " apellidos=:apellidos";
                    $counter++;
                }

                if (!empty($usuario->email)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " email=:email";
                    $counter++;
                }

                if (!empty($usuario->password)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " password=:password";
                    $counter++;
                }

                if (!empty($usuario->rol)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " rol=:rol";
                    $counter++;
                }

                $sql .= " WHERE id=:id";

                $statement = parent::$connection->prepare($sql);

                if (!empty($usuario->nombre)) {
                    $statement->bindParam(":nombre", $usuario->nombre);
                }

                if (!empty($usuario->apellidos)) {
                    $statement->bindParam(":apellidos", $usuario->apellidos);
                }

                if (!empty($usuario->email)) {
                    $statement->bindParam(":email", $usuario->email);
                }

                if (!empty($usuario->password)) {
                    $statement->bindParam(":password", $usuario->password);
                }

                if (!empty($usuario->rol)) {
                    $statement->bindParam(":rol", $usuario->rol);
                }

                $statement->bindParam(":id", $usuario->id);
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
        $result = true;
        try {
            $tablaPedidos = new DBTablePedidos();
            $tablaPedidos->deleteWhere($id);

            $statement = parent::$connection->prepare("DELETE FROM usuarios WHERE id=:id");
            $statement->bindParam(":id", $id);
            parent::$connection->beginTransaction();
            $statement->execute();
            parent::$connection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function deleteWhere($id): bool {
        return true;
    }

}