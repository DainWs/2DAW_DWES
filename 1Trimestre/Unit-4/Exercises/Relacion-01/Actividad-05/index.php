<!DOCTYPE html>

<?php
session_start();
function hasSession($token){
    return (isset($_SESSION[$token]));
}

if (!isset($_GET['token']) && !hasSession($_GET['token'])) {
    header("location: login.php");
}
?>
<html lang="es">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <p>Ha iniciado sesión como nombreUsuario</p>
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <input type="hidden" name="cerrar" value="true"/>
                <input type="submit" value="cerrar sesi&oacute;n"/>
            </form>
        </main>
    </body>
</html>