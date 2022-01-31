<?php

namespace src\services\db;

use DBTable;
use Exception;
use PDO;
use src\models\LineasPedidos;

class DBTableLineasPedidos extends DBTable {
    
    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM lineas_pedidos ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, LineasPedidos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM lineas_pedidos WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, LineasPedidos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function insert($lineaPedido): bool {
        $result = true;

        if ($lineaPedido instanceof LineasPedidos) {
            try {
                $statement = parent::$connection->prepare("INSERT INTO lineas_pedidos VALUES (:id, :pedido_id, :producto_id, :unidades)");
                $statement->bindParam(":id", $lineaPedido->id);
                $statement->bindParam(":pedido_id", $lineaPedido->pedido_id);
                $statement->bindParam(":producto_id", $lineaPedido->producto_id);
                $statement->bindParam(":unidades", $lineaPedido->unidades);
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
    
    public function update($lineaPedido): bool {
        $result = true;
        if ($lineaPedido instanceof LineasPedidos) {
            try {
                $sql = "UPDATE lineas_pedidos set";
                $counter = 0;
                if ($lineaPedido->producto_id  > -1) {
                    $sql .= " producto_id=:producto_id";
                    $counter++;
                }

                if ($lineaPedido->unidades > -1) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " unidades=:unidades";
                    $counter++;
                }

                $sql .= " WHERE id=:id";

                $statement = parent::$connection->prepare($sql);

                if ($lineaPedido->producto_id  > -1) {
                    $statement->bindParam(":producto_id", $lineaPedido->producto_id);
                }

                if ($lineaPedido->unidades > -1) {
                    $statement->bindParam(":unidades", $lineaPedido->unidades);
                }

                $statement->bindParam(":id", $lineaPedido->id);
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
            $statement = parent::$connection->prepare("DELETE FROM lineas_pedidos WHERE id=:id");
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
        $result = true;
        try {
            $statement = parent::$connection->prepare("DELETE FROM lineas_pedidos WHERE pedido_id=:pedido_id");
            $statement->bindParam(":pedido_id", $id);
            parent::$connection->beginTransaction();
            $statement->execute();
            parent::$connection->commit();
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }
}