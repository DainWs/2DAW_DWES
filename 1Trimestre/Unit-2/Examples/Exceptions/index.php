<?php


{
    try {
        echo "hola {$_GET['id']}";
    }
    catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    finally {
        echo "program ended";
    }
}