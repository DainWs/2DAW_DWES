<?php

namespace src\controllers;

abstract class PostController {
    protected $errors = [];

    public function getErrors() {
        return $this->errors;
    }
}