<!DOCTYPE html>
<html lang="es">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <?php
            /*
            $datos = simplexml_load_file('empleados.xml');
            echo "<br/>";
            if (!$datos) {
                echo "Error al leer el xml";
            }
            */
            $dom = new DOMDocument();
            $dom->load('empleados.xml');
            $res = $dom->schemaValidate('departamentos.xsd');

            if($res) {
                $datos = new SimpleXMLElement($dom->saveXML());
                foreach($datos->xpath("//edad") as $valor) {
                    echo "edad: $valor";
                    echo "<br/>";
                }
            }
        ?>
    </body>
</html>
