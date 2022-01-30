<?php
namespace src\domain\packages;

use Exception;
use src\domain\ViewConstants;
use src\models\Usuarios;
use src\services\db\DBTableUsuarios;

class UsuarioPackager extends DataPackager {
    public function getData(): Array {
        $usuario = new Usuarios();
        if (isset($_GET['usuarioID'])) {
            try {
                $usuario = $this->getUsuarioWithID($_GET['usuarioID']);
            } catch(Exception $ex) {}
        }
        $this->add(ViewConstants::MODEL_USUARIO, $usuario);
        $this->add(ViewConstants::URL, $this->getPostControllerURL($usuario));
        return $this->data;
    }

    private function getUsuarioWithID($id): ?Usuarios {
        return (new DBTableUsuarios())->queryWith($id)[0];
    }

    private function getPostControllerURL($usuario): String {
        $method = ($usuario) ? 'doEditUserPost' : 'doAddUserPost';
        $controller = 'UsuariosController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}