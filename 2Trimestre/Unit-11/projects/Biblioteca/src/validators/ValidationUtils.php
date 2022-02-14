<?php
namespace App\validators;

abstract class ValidationUtils {

    public static function validateDNI($value) {

    }

    public static function validateIsNotEmpty($value) {
        return ($value != null && !empty($value));
    }
}