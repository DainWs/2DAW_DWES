<?php

namespace src\domain\packages;

abstract class DataPackager {

    protected Array $data;

    public function __construct() {
        $this->data = [];
    }

    protected function add($key, $value): void {
        $this->data[$key] = $value;
    }

    public abstract function getData(): Array;
}