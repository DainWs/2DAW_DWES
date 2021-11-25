<!DOCTYPE html>
<html>
    <head>
        <title>Ejemplo 5</title>
        <style type="text/css">
        </style>
    </head>
    <body>
    <?php
        try {
            include("animales/Perro.php");
            include("animales/Ladrador.php");
        }
        catch(Exception $ex) {
            echo "Se ha producido un error al localizar un fichero, message: $ex->getMessage()";
            exit;
        }

        $labrador = new Ladrador('Labrador', 'Labrador', 60, 'gray');
        $labrador->mostrar_propiedades();

        $caniche = new Perro('Caniche', 'Caniche', 10, 'brown');
        if (is_string($caniche)) {
            echo $caniche;
            exit;
        }

        $caniche->mostrar_propiedades();

        $result = $labrador->setName('123456789012345678901234567890');
        echo ($result) 
            ? 'El nombre del perro se actualizo correctamente.' 
            : 'El nombre del perro tiene que tener un tamanio maximo de 21.';

    ?>
    </body>
</html>