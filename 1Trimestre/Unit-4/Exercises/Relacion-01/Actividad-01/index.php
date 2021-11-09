<!DOCTYPE html>
<?php
    function hasCookie($key): bool {
        return (isset($_COOKIE[$key]));
    }
    
    $cookieName = "visits";
    $cookieValue = 0;
    if (hasCookie($cookieName)) {
        $cookieValue = $_COOKIE[$cookieName];
    }
    $cookieDate = date_modify(date_create(), "+1 years");
    $cookieValue++;

    setcookie($cookieName, $cookieValue, ['expires'=>$cookieDate->getTimestamp()]);
?>
<html lang="es">
    <head>
        <title>Cookies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <p>Times that you visit this page: <?= $_COOKIE[$cookieName] ?? 0 ?></p>
    </body>
</html>