<?php
namespace src\domain\packages;

use src\domain\ViewConstants;

/**
 * This class is used to build an Array of data that will be used in Profile View.
 */
class ProfilePackager extends DataPackager {
    public function getData(): Array {
        $this->add(ViewConstants::URL, $this->getPostControllerURL());
        return $this->data;
    }

    /**
     * Return a url for a future post request, this url is builded according to some conditions
     * @return string the usl as string
     */
    private function getPostControllerURL(): String {
        $method = 'doEditUserPost';
        $controller = 'UsuariosController';
        $baseURL = $_SERVER['APP_BASE_URL'];
        return "$baseURL/$controller/$method";
    }
}