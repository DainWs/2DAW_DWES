<?php

namespace App\domain\packages;

use App\Entity\Libros;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class HomePackager extends DataPackager {
    public function getData($args = null): Array {
        $repository = $this->doctrine->getRepository(Libros::class);
        $this->add('books', $repository->findAll());
        return $this->data;
    }
}