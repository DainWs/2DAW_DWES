<?php

namespace App\domain\packages;

use App\Entity\Usuarios;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class UserPackager extends DataPackager {
    public function getData($id = null): Array {
        $repository = $this->doctrine->getRepository(Usuarios::class);
        $this->add('users', $repository->findAll());
        $this->add('user', $repository->find($id));
        return $this->data;
    }
}