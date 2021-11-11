<?php
include("controller/SessionManager.php");
doCurrentSessionControl();
header("location: views/home.php");
?>