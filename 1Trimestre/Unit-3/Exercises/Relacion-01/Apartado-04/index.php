<!DOCTYPE html>
<!--
NOTA: Antes de comenzar el ejercicio investiga sobre $_REQUEST. En esta práctica 
el envío de datos debe hacerse por POST y la recuperación con REQUEST.
Se pide un formulario que solicite la base y la altura de un triángulo y calcule su área.
-->
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            form {
                margin: 5px;
                border: 1px solid black;
                border-collapse: collapse;
                border-radius: 5px;
            }
            form > div {
                border: 1px solid black;
                border-width: 0 0 1px 0;
                border-radius: 5px;
                padding: 15px;
            }
            form > input {
                margin: 5px;
            }
        </style>
    </head>
    <body>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div>
                <label for="base">base:</label><br/>
                <input type="number" id="base" name="base" value="<?php echo $_POST['base'] ?? ''; ?>"><br/>

                <label for="altura">altura:</label><br/>
                <input type="number" id="altura" name="altura" value="<?php echo $_POST['altura'] ?? ''; ?>"><br/><br/>
            </div>
            <input type="submit" value="Submit">
        </form>
        <?php 
            $base = (isset($_REQUEST['base'])) ? $_REQUEST['base'] : -1;
            $altura = (isset($_REQUEST['altura'])) ? $_REQUEST['altura'] : -1;

            if ($altura > 1 && $base > 1) {
                echo "Area: " . (($base * $altura)/2);
            }
            else {
                echo "error, valores no validos.";
            }
        ?>
    </body>
</html>