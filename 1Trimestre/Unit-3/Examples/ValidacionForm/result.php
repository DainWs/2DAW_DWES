<!DOCTYPE html>
<?php
$name = $_POST['name'];
$surname = $_POST['surnames'];
$age = intval($_POST['age']);
$email = $_POST['email'];

$error = [];
if (!is_string($name) || preg_match("/[0-9]/i", $name)) {
    $error = 'nombre';
}

if (!is_string($surname) || preg_match("/[0-9]/i", $surname)) {
    $error = 'apellidos';
}

if ($age < 0) {
    $error = 'edad';
}

if (!is_string($email) || !preg_match("/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i", $email)) {
    $error = 'correo';
}

if (!empty($error)) {
    header("location: ./?error=$error");
}
?>
<html lang="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>Buenos d&iacute;as</h1>
        <p><b>Su nombre es : </b> <?= $name; ?> </p>
        <p><b>Sus apellidos son : </b> <?= $surname; ?> </p>
        <p><b>Su edad es : </b> <?= $age; ?> </p>
        <p><b>Su correo es : </b> <?= $email; ?> </p>
    </body>
</html>