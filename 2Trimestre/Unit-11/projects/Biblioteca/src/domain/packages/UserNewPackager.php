<?php

namespace App\domain\packages;

/**
 * This class is used to build an Array of data that will be used in Home View.
 */
class UserNewPackager extends DataPackager {
    public function getData($id = null): Array {
        return $this->data;
    }
}