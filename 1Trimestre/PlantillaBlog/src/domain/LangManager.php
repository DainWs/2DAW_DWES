<?php
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

include("../../src/lang/$lang.php");

function traduce($text): String {
    return LANG_TEXT[$text] ?? $text;
}