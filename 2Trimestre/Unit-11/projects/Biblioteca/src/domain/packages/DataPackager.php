<?php

namespace App\domain\packages;

use Doctrine\Persistence\ManagerRegistry;

/**
 * This class is used to build an Array of data that will be used in Views.
 */
abstract class DataPackager {
    /**
     * The array of data
     * @var Array $data
     */
    protected Array $data;

    public function __construct() {
        $this->data = [];
    }

    public function setRegistry(ManagerRegistry $doctrine): void {
        $this->doctrine = $doctrine;
    }

    /**
     * Add some data to the array
     * @param $key is the identifier for the valua
     * @param $value the value that you want to save in the array
     */
    protected function add($key, $value): void {
        $this->data[$key] = $value;
    }

    /**
     * Package and build the array of data
     * @return Array get the data
     */
    public abstract function getData($args = null): Array;
}