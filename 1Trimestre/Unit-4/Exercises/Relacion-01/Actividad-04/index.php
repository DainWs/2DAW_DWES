<!DOCTYPE html>
<?php
    if (isset($_POST['cookies'])) {
        $cookieDate = date_modify(date_create(), "+1 years");
        setcookie('cookieAccepted', true, ['expires'=>$cookieDate->getTimestamp()]);
    }
?>
<html lang="es">
    <head>
        <title>Cookies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php if(!isset($_COOKIE['cookieAccepted'])): ?>
            <form  action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="cookies">
                ¿Acceptas nuestras cookies?
                <input type="hidden" name="cookies" value="si"/>
                <input type="submit" value="confirmar"/>
            </form>
        <?php endif; ?>
    </body>
</html>