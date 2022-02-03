<?php

namespace src\domain\validators;

/**
 * This is a class maked for static validation methods
 */
abstract class FormValidator {
    /**
     * Validate if the string is not empty
     * @return bool true if is not empty, false otherwise
     */
    public static function validateIsNotEmpty(String $value): bool {
        return !SELF::validateIsEmpty($value);
    }
    
    /**
     * Validate if the string is empty
     * @return bool true if is empty, false otherwise
     */
    public static function validateIsEmpty(String $value): bool {
        return empty($value);
    }
    
    /**
     * Validate if the email is correct
     * @return bool true if is correct, false otherwise
     */
    public static function validateEmail(String $email): bool {
        return preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i", $email);
    }
    
    /**
     * Validate if is a number
     * @return bool true if is, false otherwise
     */
    public static function validateNumber($number): bool {
        return is_numeric($number) || is_double($number) || is_float($number);
    }
}