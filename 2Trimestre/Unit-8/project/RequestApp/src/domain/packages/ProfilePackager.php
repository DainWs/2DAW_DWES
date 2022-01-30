<?php
namespace src\domain\packages;

use src\domain\ViewConstants;

class ProfilePackager extends DataPackager {
    public function getData(): Array {
        $this->add(ViewConstants::URL, $this->getPostControllerURL());
        return $this->data;
    }

    private function getPostControllerURL(): String {
        $method = 'doEditUserPost';
        $controller = 'UsuariosController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}