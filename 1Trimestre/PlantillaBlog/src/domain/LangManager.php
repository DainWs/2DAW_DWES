<?php
// get the server accepted language as 'es'/'en'
$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

//Include the array with the traduced data
include("../src/lang/$lang.php");

/**
 * traduce the english text given
 * @param String $text the text to translate
 * @return String return the text traduction, if the text do not have traduction the $text is returned
 */
function traduce(String $text): String {
    return LANG_TEXT[$text] ?? $text;
}