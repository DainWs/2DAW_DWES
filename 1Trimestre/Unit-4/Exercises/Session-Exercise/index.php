<?php
require_once("domain/SessionManager.php");

if (!hasSession()) {
    header("location: views/login.php");
    exit;
}

header("location: views/home.php");
?>