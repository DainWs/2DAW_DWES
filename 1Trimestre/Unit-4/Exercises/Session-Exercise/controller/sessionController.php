<?php
function existSession($token): bool {
    $session = $_SESSION[$token] ?? null;
    return ($session != null);
}

session_start();
if (existSession($_GET['token'])) {
    header("location: views/login.php");
}