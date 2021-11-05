<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            $file = fopen("Fichero.txt", "r");
            while ($fileInfo = fscanf($file,  "%d %d %d %d")) {
                echo "$fileInfo";
                echo "<br/>";
            }

            rewind($file);

            while ($fileInfo = fscanf($file, "%d %d %d %d")) {
                foreach ($fileInfo as $key => $value) {
                    echo "$value ";
                }
                echo "<br/>";
            }

            fclose($file);
        ?>
    </body>
</html>