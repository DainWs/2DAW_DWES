<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $fileStream = fopen('Fichero.txt', 'r');
            do {
                $char = fgetc($fileStream);
                if ($char !== false) {
                    echo htmlspecialchars("$char");
                }
            } while ($char !== false);
        ?>
    </body>
</html>