<!DOCTYPE html>
<?php
    if (!isset($_POST['UPDATE_BTN'])) {
        
        $username = $_POST['cookieUser'] ?? '';
        $cookieTime = $_POST['cookieTime'] ?? 0;

        if (isset($_POST['ADD_BTN'])) {
            $cookieDate = date_modify(date_create(), "+$cookieTime seconds");
            setcookie('usuario', $username, $cookieDate->getTimestamp());
        }
        elseif (isset($_POST['DELETE_BTN'])) {
            setcookie('usuario', $username, time() - 60);
        }
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Actividad 8</title>
        <style>
            header h1 {text-align: center;}
        </style>
    </head>
    <body>
        <article>
            <header>
                <h1>Creacion y destruccion de cookies</h1>
            </header>
            
            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="cookieUser">Nombre de usuario:</label>
                <input id="cookieUser" type="text" name="cookieUser" value="<?= $_POST['cookieUser'] ?? '' ?>" require/><br/>

                <label for="cookieTime">Duraci&oacute;n cookie (entre 1 y 60 segundos):</label>
                <input id="cookieTime" type="num" name="cookieTime" min="1" max="60" value="<?= $_POST['cookieTime'] ?? '' ?>" require/><br/>

                <input type="submit" name="ADD" value="Crear cookie"/>
                <input type="submit" name="DELETE" value="Borrar cookie"/>
                <input type="submit" name="UPDATE" value="Actualizar cookie"/>
            </form>

            <section>
                <?php if (!isset($_COOKIE['user'])): ?>
                    <p>¡No hay ninguna cookie almacenada!</p>
                <?php else: ?>
                    <p>La cookie <b>usuario</b> tiene el valor <b><?= $_COOKIE['user'] ?></b></p>
                <?php endif; ?>
            </section>    
        </article>
    </body>
</html>