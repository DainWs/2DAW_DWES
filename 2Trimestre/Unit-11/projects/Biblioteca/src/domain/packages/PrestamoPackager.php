<?php

namespace App\domain\packages;

use App\Entity\Libros;
use App\Entity\Usuarios;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class PrestamoPackager extends DataPackager {
    public function getData($args = null): Array {
        $repository = $this->doctrine->getRepository(Libros::class);
        $this->add('books', $repository->findAll());

        $repository = $this->doctrine->getRepository(Usuarios::class);
        $this->add('users', $repository->findAll());
        return $this->data;
    }
}