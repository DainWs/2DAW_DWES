<?php
namespace App\validators;

abstract class Validator {
    public function __construct() {
        $this->errors = [];
    }

    public abstract function validate(): bool;

    public function hasErrors(): bool {
        return count($this->errors);
    }

    public function getErrors(): bool {
        return $this->errors;
    }
}