<!DOCTYPE html>
<?php header("refresh: 10; url=./index.php"); ?>
<html lang="es">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <h1 style="text-align: center;">Con la funci&oacute;n header() hemos especificado que esta p&aacute;gina no se guarde en la memoria cach&eacute;, sino que se llame a s&iacute; misma desde la p&aacute;gina original cada 10 segundos. Puede comprobarse dejando la p&aacute;gina sin actualizar 10 segundos o polsando sobre Actualizar.</h1>
            <p><?= date("d M y H:i:s", strtotime('now'));?></p>
            <p>Se repite la carga de la p&aacute;gina.</p>
            <p><?= date("d M y H:i:s", strtotime('now'));?></p>
        </main>
    </body>
</html>