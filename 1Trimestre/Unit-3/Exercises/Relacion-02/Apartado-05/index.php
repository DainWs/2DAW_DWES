<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            // Creacion fichero
            $lines = [
                "Hola muy buenas, ¿como estas?",
                "Bien, ¿y tu?",
                "Bien!!, gracias"
            ];
            $result = file_put_contents("Fichero.txt", $lines);
            if($result){
                // Abrirlo en modo escritura 
                $fileStream = fopen('Fichero.txt', 'r');
                // Lee su contenido con fgets() y muestra el contenido.
                do {
                    $line = fgets($fileStream);
                    if ($line !== false) {
                        echo htmlspecialchars("$line");
                        echo "<br/>";
                    }
                } while ($line !== false);
                // Cierra el archivo.
                fclose($fileStream);

                // Escribe dentro de ese archivo un nuevo texto,
                // recuerda que ahora no tendrá que estar abierto en 
                // modo lectura.
                $fileStream = fopen('Fichero.txt', 'w');
                fwrite($fileStream, "Otra linea mas");
                fclose($file);

                // Copia ese fichero de texto en el mismo directorio con otro nombre.
                if (copy('Fichero.txt', 'FicheroNuevo.txt')) {
                    // Renombra el archivo de texto anterior.
                    if(rename('Fichero.txt', 'FicheroOld.txt')) {
                        // Elimina este último archivo.
                        if(unlink('FicheroOld.txt')){
                            echo "Se realizaron todas las acciones correctamente...\n";
                        }
                        else {
                            echo "failed to delete FicheroOld.txt...\n";
                        }
                    }
                    else {
                        echo "failed to rename Fichero.txt...\n";
                    }
                }
                else {
                    echo "failed to copy Fichero.txt...\n";
                }
            }
        ?>
    </body>
</html>