<?php

function validateIsNotEmpty(String $value): bool {
    return !validateIsEmpty($value);
}

function validateIsEmpty(String $value): bool {
    return empty($value);
}

function validateEmail(String $email): bool {
    return preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i", $email);
}

function validateNumber($number): bool {
    return is_numeric($number);
}