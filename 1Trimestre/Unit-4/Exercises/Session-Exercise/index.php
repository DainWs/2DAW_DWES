<?php
include("domain/SessionManager.php");
doCurrentSessionControl();
header("location: views/home.php");
?>