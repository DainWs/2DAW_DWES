<?php
require_once('../src/config/constants.php');
require_once('../src/services/db/DBCategoryConnection.php');
/*
$newCategory = [
    CATEGORY_NAME => 'Programación'
];

$result = saveCategory($newCategory);*/
$result = true;
echo ($result) ? 'true' : 'false';
echo "<br/>";
if ($result) {
    $idCategory = getCategoryByID(1);
    var_dump($idCategory);
    echo "<br/>";

    $categories = getAllCategories();
    var_dump($categories);
    echo "<br/>";
}