<!DOCTYPE html>
<?php
    function hasCookie($key): bool {
        return (isset($_COOKIE[$key]));
    }
    
    $cookieName = "visits";
    $cookieValue = [];
    if (hasCookie($cookieName)) {
        $cookieValue = $_COOKIE[$cookieName];
    }
    $cookieDate = date_modify(date_create(), "+1 hours");
    array_push($cookieValue, date("d M y H:i:s", strtotime('now')));
    
    setcookie("$cookieName", $cookieValue . '', ['expires'=>$cookieDate->getTimestamp()]);
?>
<html lang="es">
    <head>
        <title>Cookies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <p><?=$cookieValue ?></p>
    </body>
</html>