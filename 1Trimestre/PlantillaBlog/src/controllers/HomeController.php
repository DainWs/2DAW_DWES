<?php
require_once("../../src/domain/LangManager.php");
require_once("../../src/domain/SessionManager.php");

if (!hasSession()) {
    header("location: views/login.php");
    exit;
}

function getArticulos(): Array {
    $articles = [
        "Lechuga" => 5,
        "Manzana" => 35,
        "Legumbres" => 23
    ];
    return $articles;
}

// PAGE DATA DECLARATION
const DATA = [
    'pageTitle' => "Home",
    'cssFile' => "../css/index.css",
    'articulos' => getArticulos()
];