<?php

namespace src\services\db;

use DBTable;
use Exception;
use PDO;
use src\models\Pedidos;

class DBTablePedidos extends DBTable {

    public function query(String $name = "", String $order = 'id', String $orderType = SQL_ORDER_ASC): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM pedidos ORDER BY :fieldOrder :orderType");
            $statement->bindParam(":fieldOrder", $order);
            $statement->bindParam(":orderType", $orderType);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Pedidos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryWith($id): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM pedidos WHERE id=:id");
            $statement->bindParam(':id', $id);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Pedidos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    public function queryRecently(Pedidos $pedido): array|false {
        $result = [];
        try {
            $fecha = date($pedido->fecha->format('Y-m-d'));
            $time = date($pedido->hora->format('H:i:s'));

            $statement = parent::$connection->prepare("SELECT * FROM pedidos WHERE usuario_id=:usuario_id AND fecha=:fecha AND hora=:hora");
            $statement->bindParam(':usuario_id', $pedido->usuario_id);
            $statement->bindParam(':fecha', $fecha);
            $statement->bindParam(':hora', $time);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, Pedidos::class);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            var_dump($ex);
            $result = false;
        }
        return $result;
    }

    public function insert($pedido): bool {
        $result = true;

        if ($pedido instanceof Pedidos) {
            try {
                $fecha = date($pedido->fecha->format('Y-m-d'));
                $time = date($pedido->hora->format('H:i:s'));

                $statement = parent::$connection->prepare("INSERT INTO pedidos VALUES (:id, :usuario_id, :provincia, :localidad, :direccion, :coste, :estado, :fecha, :hora)");
                $statement->bindParam(":id", $pedido->id);
                $statement->bindParam(":usuario_id", $pedido->usuario_id);
                $statement->bindParam(":provincia", $pedido->provincia);
                $statement->bindParam(":localidad", $pedido->localidad);
                $statement->bindParam(":direccion", $pedido->direccion);
                $statement->bindParam(":coste", $pedido->coste);
                $statement->bindParam(":estado", $pedido->estado);
                $statement->bindParam(":fecha", $fecha);
                $statement->bindParam(":hora", $time);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
            
                echo $ex->getMessage();
                $result = false;
            }
        }
        return $result;
    }
    
    public function update($pedido): bool {
        $result = true;
        if ($pedido instanceof Pedidos) {
            try {
                $sql = "UPDATE pedidos set";
                $counter = 0;
                if (!empty($pedido->provincia)) {
                    $sql .= " provincia=:provincia";
                    $counter++;
                }

                if (!empty($pedido->localidad)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " localidad=:localidad";
                    $counter++;
                }

                if (!empty($pedido->direccion)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " direccion=:direccion";
                    $counter++;
                }

                if ($pedido->coste > -1) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " coste=:coste";
                    $counter++;
                }

                if (!empty($pedido->estado)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " estado=:estado";
                    $counter++;
                }

                if (!empty($pedido->fecha)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " fecha=:fecha";
                    $counter++;
                }

                if (!empty($pedido->hora)) {
                    if ($counter > 0) {
                        $sql .= ",";
                    }
                    $sql .= " hora=:hora";
                    $counter++;
                }

                $sql .= " WHERE id=:id";

                $statement = parent::$connection->prepare($sql);

                if (!empty($pedido->provincia)) {
                    $statement->bindParam(":provincia", $pedido->provincia);
                }

                if (!empty($pedido->localidad)) {
                    $statement->bindParam(":localidad", $pedido->localidad);
                }

                if (!empty($pedido->direccion)) {
                    $statement->bindParam(":direccion", $pedido->direccion);
                }

                if ($pedido->coste > -1) {
                    $statement->bindParam(":coste", $pedido->coste);
                }

                if (!empty($pedido->estado)) {
                    $statement->bindParam(":estado", $pedido->estado);
                }

                if (!empty($pedido->fecha)) {
                    $statement->bindParam(":fecha", $pedido->fecha);
                }

                if (!empty($pedido->hora)) {
                    $statement->bindParam(":hora", $pedido->hora);
                }

                $statement->bindParam(":id", $pedido->id);
                parent::$connection->beginTransaction();
                $statement->execute();
                parent::$connection->commit();
            } catch (Exception $ex) {
                $this->errors = $ex->getMessage();
            
                echo $ex->getMessage();
                $result = false;
            }
        }
        return $result;
    }

    public function delete($id): bool {
        $result = true;
        try {
            $tablaLineasPedidos = new DBTableLineasPedidos();
            $tablaLineasPedidos->deleteWhere($id);

            $statement = parent::$connection->prepare("DELETE FROM pedidos WHERE id=:id");
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
            $statement = parent::$connection->prepare("SELECT id FROM pedidos WHERE usuario_id=:usuario_id");
            $statement->bindParam(":usuario_id", $id);
            $statement->execute();
            $selectedPedidos = $statement->fetchAll(PDO::FETCH_ASSOC);

            $tablaLineasPedidos = new DBTableLineasPedidos();
            foreach ($selectedPedidos as $value) {
                $tablaLineasPedidos->deleteWhere($value['id']);
            }

            $statement = parent::$connection->prepare("DELETE FROM pedidos WHERE usuario_id=:usuario_id");
            $statement->bindParam(":usuario_id", $id);
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