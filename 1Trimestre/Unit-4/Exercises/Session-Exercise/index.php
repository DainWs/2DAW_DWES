<?php
require_once("domain/SessionManager.php");
doCurrentSessionControl();
header("location: views/home.php");
?>