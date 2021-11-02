<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <main>
            <?php 
                echo 'Buenos dias, ' . $_POST['username'] . '.<br/>'; 
                echo 'Su contraseña es :'. $_POST['password'] . '<br/>';
            ?>
            <form action="./" method="POST">
                <input type="submit" value="Volver"/>
            </form>
        </main>
    </body>
</html>