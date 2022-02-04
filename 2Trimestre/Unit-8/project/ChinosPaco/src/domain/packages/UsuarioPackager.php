<?php
namespace src\domain\packages;

use Exception;
use src\domain\ViewConstants;
use src\models\Usuarios;
use src\services\db\DBTableUsuarios;

/**
 * This class is used to build an Array of data that will be used in Usuario View.
 */
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

    /**
     * @param int $id is the id for the searched usuario
     * @return ?Usuarios make a query to the db to retrieve de user defined by id
     */
    private function getUsuarioWithID($id): ?Usuarios {
        return (new DBTableUsuarios())->queryWith($id)[0];
    }

    /**
     * Return a url for a future post request, this url is builded according to some conditions
     * @return string the usl as string
     */
    private function getPostControllerURL($usuario): String {
        $method = ($usuario) ? 'doEditUserPost' : 'doAddUserPost';
        $controller = 'UsuariosController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}