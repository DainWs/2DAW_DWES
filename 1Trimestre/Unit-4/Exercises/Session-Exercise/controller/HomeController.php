<?php
require_once("../domain/LangManager.php");
require_once("../domain/SessionManager.php");

doCurrentSessionControl();

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