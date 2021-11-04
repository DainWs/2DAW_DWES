<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $file = "./Fichero.txt";
            if (file_exists($file)) {
                $lines = file($file);
                foreach ($lines as $i => $line) {
                    echo "$i | " . htmlspecialchars($line) . "<br/>";
                }                
            }
            else {
                echo "Error, el fichero no existe.";
            }
        ?>
    </body>
</html>