<?php

namespace src\controllers;

use DateTime;
use Exception;
use src\domain\SessionManager;
use src\domain\validators\FormValidator;
use src\libraries\EmailManager;
use src\services\db\DBTableLineasPedidos;
use src\services\db\DBTablePedidos;
use src\services\db\DBTableProductos;

/**
 * Some methods are used for ajax too
 */
class CarritoController extends PostController {

    public function doBuyRequest() {
        $session = SessionManager::getInstance()->getSession();
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $provincia = $_POST['provincia'] ?? '';
        $localidad = $_POST['localidad'] ?? '';
        $direccion = $_POST['direccion'] ?? '';

        $errors = [];
        if (!$session) {
            $errors['others']= 'You must sign up/sign in to buy something.';
        }

        if (count($pedido->getLineas()) <= 0) {
            $errors['others']= 'You didnt select any product.';
        }
        
        if (FormValidator::validateIsEmpty($provincia)) {
            $errors['provincia'] = 'You have to specify a provincia.';
        }

        if (FormValidator::validateIsEmpty($localidad)) {
            $errors['localidad'] = 'You have to specify a localidad.';
        }
        
        if (FormValidator::validateIsEmpty($direccion)) {
            $errors['direccion'] = 'You have to specify a direccion.';
        }
        
        $result = false;
        var_dump($errors);
        var_dump((count($errors) == 0));
        if (count($errors) == 0) {
            // DB Access exception control            
            try {
                $pedido->id = 0;
                $pedido->usuario_id = $session->id;
                $pedido->fecha = new DateTime(date('Y-m-d'));
                $pedido->hora = new DateTime(date('h:i:s'));
                $pedido->estado = 'packaging';
                $pedido->provincia = $provincia;
                $pedido->localidad = $localidad;
                $pedido->direccion = $direccion;

                $pedidoTable = new DBTablePedidos();
                $result = $pedidoTable->insert($pedido);
                if ($result) {
                    $newPedido = $pedidoTable->queryRecently($pedido)[0];
                    $newPedido->setLineas($pedido->lineas);
                    $newPedido->setUsuario($pedido->usuario);

                    $lineasPedidoTable = new DBTableLineasPedidos();
                    foreach ($pedido->getLineas() as $linea) {
                        $result = $result && $lineasPedidoTable->insert($linea);
                    }
                }
            }
            catch(Exception $ex) {
                $result = false;
            }
            finally {
                var_dump($result);
                if ($result) {
                    try {
                        //TODO here comes the bank transactions actions
                        $pedido->setUsuario(clone  $session);

                        $emailSender = new EmailManager();
                        $emailSender->send($pedido);
                        SessionManager::getInstance()->clearSession();
                        SessionManager::getInstance()->addSession($session);
                        NavigationController::home();
                    } catch(Exception $ex) {
                        echo $ex->getMessage();
                    }
                } else {
                    $errors['others']= 'An unknown error was success, please try it again more later.';
                }
            }
        }

        $this->errors[CONTROLLER_CARRITO_BUY] = $errors;
        return (count($errors) > 0);
    }

    public function add() {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $id = $_GET['productID'] ?? '';

        $product = null;
        try {
            $table = new DBTableProductos();
            $product = $table->queryWith($id)[0];
        } catch(Exception $ex) {}

        if ($product) {
            $pedido->add($product);
        }

        SessionManager::getInstance()->updateCarritoSession($pedido);
        return;
    }

    public function get() {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        echo json_encode($pedido, JSON_FORCE_OBJECT);
        exit;
    }

    public function set() {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';
        $cantidad = $_POST['cantidad'] ?? 1;

        $pedido->set($id, $cantidad);
        SessionManager::getInstance()->updateCarritoSession($pedido);
        echo json_encode($pedido, JSON_FORCE_OBJECT);
        exit;
    }

    public function remove() {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';

        $pedido->remove($id);
        SessionManager::getInstance()->updateCarritoSession($pedido);
        echo json_encode($pedido);
        exit;
    }
}