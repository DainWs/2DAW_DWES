<?php

namespace src\controllers;

use DateTime;
use Exception;
use Monolog\Logger;
use src\domain\SessionManager;
use src\domain\validators\FormValidator;
use src\libraries\EmailManager;
use src\models\Pedidos;
use src\services\db\DBTableLineasPedidos;
use src\services\db\DBTablePedidos;
use src\services\db\DBTableProductos;

/**
 * This is the controller for the Carritos post requests
 * Some methods are used for ajax too
 */
class CarritoController extends PostController {

    /**
     * Do all actions for a buy post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doBuyRequest(): bool {
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
                    
                    if (isset($lineasPedidoTable->errors)) {
                        $errors['others'] = $lineasPedidoTable->errors;
                        $result = false;
                    }
                }
            }
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $result = false;
            }
            finally {
                if ($result) {
                    try {
                        //TODO here comes the bank transactions actions
                        $pedido->setUsuario($session);

                        $emailSender = new EmailManager();
                        $emailSender->send($pedido);

                        (new NavigationController())->moveTo('home.php');
                        SessionManager::getInstance()->updateCarritoSession(new Pedidos());
                    } catch(Exception $ex) {
                        $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                        $errors['others']= 'An unknown error was success, please try it again more later.';
                    }
                } else {
                    if (!isset($errors['others'])) {
                        $errors['others']= 'An unknown error was success, please try it again more later.';
                    }
                }
            }
        }
        
        $this->errors[CONTROLLER_CARRITO_BUY] = $errors;
        return (count($errors) > 0);
    }

    /**
     * Do all actions for a add product to carrito post type
     */
    public function add(): void {
        $this->logger->log('[Carrito] Buy request received.');
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

    /**
     * Do all actions for a get pedido post type
     * return the pedido as JSON format
     */
    public function get(): void {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        echo json_encode($pedido, JSON_FORCE_OBJECT);
        exit;
    }

    /**
     * Do all actions for a change product units in carrito post type
     */
    public function set(): void {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';
        $cantidad = $_POST['cantidad'] ?? 1;

        $pedido->set($id, $cantidad);
        SessionManager::getInstance()->updateCarritoSession($pedido);
        echo json_encode($pedido, JSON_FORCE_OBJECT);
        exit;
    }

    /**
     * Do all actions for a remove product from carrito post type
     */
    public function remove() {
        $pedido = SessionManager::getInstance()->getCarritoSession();
        $id = $_POST['productID'] ?? '';

        $pedido->remove($id);
        SessionManager::getInstance()->updateCarritoSession($pedido);
        echo json_encode($pedido);
        exit;
    }
}