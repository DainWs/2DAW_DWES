<?php

namespace src\controllers;

use DateTime;
use src\models\Usuarios;
use src\services\db\DBTableUsuarios;

/**
 * This is the controller of Ajax requests
 */
class UsersController extends PostController {

    /**
     * Manage the diferent request methods actions
     */
    public function users(): void {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'PUT':
                $this->putUser();
                break;
            case 'GET':
                $this->getUsers();
                break;
            default:
                echo "METHOD NOT ALLOWED";
                break;
        }
        exit(0);
    }

    private function getUsers() {
        $name = $_GET['name'] ?? '';
        $order = $_GET['order'] ?? 'id';
        $orderType = $_GET['orderType'] ?? SQL_ORDER_ASC;

        $table = new DBTableUsuarios();
        $users = $table->query($name, $order, $orderType);
        echo json_encode($users);
    }

    private function putUser() {
        parse_str(file_get_contents("php://input"), $PUT);
        $newUsuario = new Usuarios();
        $newUsuario->id = null;
        $newUsuario->dni = $PUT['dni'] ?? '';
        $newUsuario->nombre = $PUT['first_name'] ?? '';
        $newUsuario->apellidos = $PUT['last_name'] ?? '';
        $newUsuario->domicilio = $PUT['domicile'] ?? '';
        $newUsuario->poblacion = $PUT['population'] ?? '';
        $newUsuario->provincia = $PUT['province'] ?? '';
        $newUsuario->birthday = new DateTime($PUT['birthday'] ?? 'now');
        var_dump($newUsuario);
        $table = new DBTableUsuarios();
        $result = $table->insert($newUsuario);
        echo json_encode($result);
    }
}