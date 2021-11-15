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
            include("Animales/Animales.php");
            include("Animales/Ballena.php");
            include("Animales/Gato.php");
            include("Animales/Perro.php");
        }
        catch(Exception $ex) {
            echo "Se ha producido un error al localizar un fichero, message: $ex->getMessage()";
            exit;
        }

        echo "<br/>==Perro==<br/>";
        $perro = new Perro('Labrador', 'Labrador', 60, 'gray');
        $perro->speak();
        echo "<br/>";
        $perro->mostrar_propiedades();

        echo "<br/>==Gato==<br/>";
        $gato = new Gato('Michi', 'Gato', 10, 'brown');
        $gato->speak();
        echo "<br/>";
        $gato->mostrar_propiedades();

        echo "<br/>==Ballena==<br/>";
        $ballena = new Ballena('Ballena blanca', 450, 'white');
        $ballena->speak();
        echo "<br/>";
        $ballena->mostrar_propiedades();

    ?>
    </body>
</html>