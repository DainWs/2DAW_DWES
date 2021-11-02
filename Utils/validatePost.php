<?php 
    const PHONE_REGEX = "/^(?:\+[0-9]{2})?[0-9]{9}$/i";
    const MAIL_REGEX = "/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i";

    function validatePhone($text) {
        $text = str_replace("[\s-]+", "", $text);
        return (preg_match(PHONE_REGEX, $text) == 1);
    }

    function validateMail($text) {
        return (preg_match(MAIL_REGEX, $text) == 1);
    }
