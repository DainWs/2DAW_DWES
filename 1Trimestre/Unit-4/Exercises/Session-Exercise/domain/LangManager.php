<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

include("../lang/$lang.php");

function traduce($text): String {
    return SELF::LANG_TEXT[$text] ?? $text;
}