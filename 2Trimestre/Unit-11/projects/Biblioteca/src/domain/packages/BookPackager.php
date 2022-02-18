<?php

namespace App\domain\packages;

use App\Entity\Libros;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class BookPackager extends DataPackager {
    public function getData($id = null): Array {
        $repository = $this->doctrine->getRepository(Libros::class);
        $this->add('book', $repository->find($id));
        return $this->data;
    }
}