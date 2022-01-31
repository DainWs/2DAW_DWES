<?php

namespace src\domain\validators;

class FormValidator {
    private function __construct() {}

    public static function validateIsNotEmpty(String $value): bool {
        return !SELF::validateIsEmpty($value);
    }
    
    public static function validateIsEmpty(String $value): bool {
        return empty($value);
    }
    
    public static function validateEmail(String $email): bool {
        return preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i", $email);
    }
    
    public static function validateNumber($number): bool {
        return is_numeric($number);
    }
}