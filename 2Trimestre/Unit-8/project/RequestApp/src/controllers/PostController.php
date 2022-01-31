<?php

namespace src\controllers;

use src\libraries\LogManager;

abstract class PostController {
    protected Array $errors;
    protected LogManager $logger;

    public function __construct() {
        $this->errors = [];
        $this->logger = new LogManager('Controllers');
    }

    public function getErrors() {
        return $this->errors;
    }
}