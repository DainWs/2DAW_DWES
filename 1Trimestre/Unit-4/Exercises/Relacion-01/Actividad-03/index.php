<!DOCTYPE html>
<?php
    $cookieValue = '#FFFFFF';
    if (isset($_GET['color'])) {
        $cookieValue = $_GET['color'];
    }
    else if (isset($_COOKIE['color'])) {
        $cookieValue = $_COOKIE['color'];
    }
    $cookieDate = date_modify(date_create(), "+1 years");
    setcookie('visits', $cookieValue, ['expires'=>$cookieDate->getTimestamp()]);
?>
<html lang="es">
    <head>
        <title>Cookies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body style="background-color:<?= $cookieValue ?>">
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <label for="color">Color:</label>
            <input id="color" type="color" name="color" value="<?= $cookieValue ?>"/>
            <br/>
            <input type="submit" value="Guardar"/>
        </form>
    </body>
</html>