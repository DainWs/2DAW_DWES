<?php

namespace src\controllers;

use Exception;
use src\domain\SessionManager;
use src\domain\validators\FormValidator;
use src\factories\LineasPedidoFactory;
use src\factories\PedidoFactory;
use src\services\db\DBTableLineasPedidos;
use src\services\db\DBTablePedidos;

class PedidosController extends PostController {
    
    public function doBuyRequest() {
        $session = SessionManager::getInstance()->getSession();
        $carrito = SessionManager::getInstance()->getCarritoSession();
        $provincia = $_POST['provincia'] ?? '';
        $localidad = $_POST['localidad'] ?? '';
        $direccion = $_POST['direccion'] ?? '';
        
        $errors = [];
        if ($session) {
            $errors['others']= 'You must sign up/sign in to buy something.';
        }

        if (!$carrito) {
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
        
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $pedido = (new PedidoFactory())->create();
                $pedido->usuario_id = $session->id;
                $pedido->provincia = $provincia;
                $pedido->localidad = $localidad;
                $pedido->direccion = $direccion;

                $lineasPedidos = (new LineasPedidoFactory())->createFrom($pedido, $carrito);

                $pedidoTable = new DBTablePedidos();
                $result = $pedidoTable->insert($pedido);

                if ($result) {
                    $lineasPedidoTable = new DBTableLineasPedidos();
                    foreach ($lineasPedidos as $lineaPedido) {
                        $result = $result && $lineasPedidoTable->insert($lineaPedido);
                    }
                }
            }
            catch(Exception $ex) {
                $result = false;
            }
            finally {
                if ($result) {
                   NavigationController::home();
                } else {
                    $errors['others']= 'An unknown error was success, please try it again more later.';
                }
            }
        }

        $this->errors[CONTROLLER_CARRITO_BUY] = $errors;
        return (count($errors) > 0);
    }
}