<?php

namespace App\domain\packages;

use App\Entity\Usuarios;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class UserListPackager extends DataPackager {
    public function getData($args = null): Array {
        $repository = $this->doctrine->getRepository(Usuarios::class);
        $this->add('users', $repository->findAll());
        return $this->data;
    }
}