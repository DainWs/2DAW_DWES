<?php

namespace App\domain\packages;

use App\Entity\Libros;
use App\Entity\Usuarios;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class UserPackager extends DataPackager {
    public function getData(): Array {
        $repository = $this->doctrine->getRepository(Libros::class);
        $this->add('books', $repository->queryAll());

        $repository = $this->doctrine->getRepository(Usuarios::class);
        $this->add('user', $repository->find($_REQUEST['id']));
        return $this->getData();
    }
}