<!DOCTYPE html>
<?php

$type = $_POST['tipoVivienda'] ?? '';
$zona = $_POST['zona'] ?? '';
$direccion = $_POST['direccion'] ?? '';
$nDormitorios = $_POST['nDormitorios'] ?? '';
$precio = $_POST['precio'] ?? '';
$size = $_POST['size'] ?? '';
$extras = $_POST['extras'] ?? [];
$observaciones = $_POST['observaciones'] ?? '';

$acceptedTypes = ['Piso', 'Adosado', 'Chalet', 'Casa'];
$acceptedZones = ['Centro', 'Zaidin', 'Chana', 'Albaicin', 'Sacromonte', 'Realejo'];
$acceptedNDormitorios = ['1', '2', '3', '4', '5'];

$table = [
    'Centro' => ['menos' => 30, 'mas' => 35],
    'Zaidin' => ['menos' => 25, 'mas' => 28],
    'Chana' => ['menos' => 22, 'mas' => 25],
    'Albaicin' => ['menos' => 20, 'mas' => 35],
    'Sacromonte' => ['menos' => 22, 'mas' => 25],
    'Realejo' => ['menos' => 25, 'mas' => 28]
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Comprobacion de errores
    $err = '';
    if (empty($type)) {
        $err = $err . '¡Se requiere el tipo de la vivienda! <br/>';
    }
    elseif (!in_array($type, $acceptedTypes)) {
        $err = $err .  '¡El tipo debe ser uno de los siguientes';
        foreach ($acceptedTypes as $key => $valor) {
            $err = $err .  "$valor, ";
        }
        $err = $err .  "<br/>";
    }

    if (empty($zona)) {
        $err = $err .  '¡Se requiere la zona de la vivienda! <br/>';
    }
    elseif (!in_array($zona, $acceptedZones)) {
        $err = $err .  '¡La zona debe ser uno de los siguientes';
        foreach ($acceptedZones as $key => $valor) {
            $err = $err .  "$valor, ";
        }
        $err = $err . "<br/>";
    }

    if (empty($nDormitorios)) {
        $err = $err .  '¡Se requiere el numero de habitaciones de la vivienda! <br/>';
    }
    elseif (!in_array($nDormitorios, $acceptedNDormitorios)) {
        $err = $err .  '¡El el numero de habitaciones debe ser uno de los siguientes';
        foreach ($acceptedNDormitorios as $key => $valor) {
            $err = $err .  "$valor, ";
        }
        $err = $err .  "<br/>";
    }

    if (empty($direccion)) {
        $err = $err .  '¡Se requiere la direccion de la vivienda! <br/>';
    }

    if (empty($precio)) {
        $err = $err .  '¡Se requiere el precio de la vivienda! <br/>';
    }
    elseif (!is_numeric($precio)) {
        $err = $err .  '¡El precio de be ser un valor numerico! <br/>';
    }

    if (empty($size)) {
        $err = $err .  '¡Se requiere el tamaño de la vivienda en metros cuadrados! <br/>';
    }
    elseif (!is_numeric($size)) {
        $err = $err .  '¡El tamaño de be ser un valor numerico! <br/>';
    }

    if (isset($_FILES['foto'])) {
        if (!file_exists('fotos')) {
            mkdir('fotos', 0755);
        }
        $size = round(($_FILES['foto']['size'])/1000);

        if ($size <= 100) {
            $result = move_uploaded_file($_FILES['foto']['tmp_name'], 'fotos/' . $_FILES['foto']['name']);
        } else {
            $err = $err . "El tamaño maximo de la imagene es de 100 KB, y el de esta es $size KB<br/>";
        }
    }

    if (empty($err)) {
        $datos = '';

        // No hace falta comprobar viviendas.txt porque si no existe se crea.
        $fileStream = fopen("viviendas.txt", "r");
        $datos = fread($fileStream, filesize("viviendas.txt"));
        fclose($fileStream);

        $datos = $datos . "\n";

        foreach ($_POST as $key => $value) {
            if (!empty($value)) {
                if (is_array($value)) {
                    $datos = $datos . "$key=[" . implode(', ', $value) . "];";
                }
                else {
                    $datos = $datos . "$key=\"$value\";";
                }
            }
        }
        if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
            $datos = $datos . 'file=fotos/' . $_FILES['foto']['name'] . ';';
        }

        $beneficio = $table[$zona][($size > 100) ? 'mas' : 'menos'];
        $beneficio = $precio * ($beneficio/100);
        $datos = $datos . "beneficio=$beneficio";

        $fileStream = fopen("viviendas.txt", "w");
        fwrite($fileStream, $datos);
        fclose($fileStream);
    }
}

?>
<html lang="es">

<head>
    <title>Examen Jose Antonio Duarte Perez</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="text/css" type="stylesheet" href="css/index.css">
</head>

<body>
    <main>
        <?php if (!empty($err)) : ?>
            <p class="error"><?php echo $err ?></p>
        <?php endif; ?>
        <?php if (!empty($err) || $_SERVER['REQUEST_METHOD'] == 'GET'): ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="POST" autocomplete="off">
                <label for="tipoVivienda">Tipo vivienda:</label>
                <select id="tipoVivienda" name="tipoVivienda" required>
                    <option value="Piso">Piso</option>
                    <option value="Adosado">Adosado</option>
                    <option value="Chalet">Chalet</option>
                    <option value="Casa">Casa</option>
                </select>
                <br />
                <label for="zona">Zona:</label>
                <select id="zona" name="zona" required>
                    <option value="Centro">Centro</option>
                    <option value="Zaidin">Zaid&iacute;n</option>
                    <option value="Chana">Chana</option>
                    <option value="Albaicin">Albaic&iacute;n</option>
                    <option value="Sacromonte">Sacromonte</option>
                    <option value="Realejo">Realejo</option>
                </select>
                <br />
                <label for="direccion">Direcci&oacute;n:</label>
                <input type="text" id="direccion" name="direccion" value="<?php echo $_POST['direccion'] ?? ''; ?>" required>
                <br />
                <label for="nDormitorios1">N&uacute;mero de dormitorios:</label>
                <input id="nDormitorios1" type="radio" name="nDormitorios" value="1" />
                <label for="nDormitorios1">1</label>
                <input id="nDormitorios2" type="radio" name="nDormitorios" value="2" />
                <label for="nDormitorios2">2</label>
                <input id="nDormitorios3" type="radio" name="nDormitorios" value="3" />
                <label for="nDormitorios3">3</label>
                <input id="nDormitorios4" type="radio" name="nDormitorios" value="4" />
                <label for="nDormitorios4">4</label>
                <input id="nDormitorios5" type="radio" name="nDormitorios" value="5" />
                <label for="nDormitorios5">5</label>
                <br />
                <label for="precio">
                    Precio:
                    <input type="number" id="precio" name="precio" value="<?php echo $_POST['precio'] ?? ''; ?>" required>
                    €
                </label>
                <br />
                <label for="size">
                    Tama&ntilde;o:
                    <input type="number" id="size" name="size" value="<?php echo $_POST['size'] ?? ''; ?>" required>
                    metros cuadrados
                </label>
                <br />
                <label for="piscina">Extras (marque los que procedan):</label>
                <input id="piscina" type="checkbox" name="extras[]" value="Piscina" />
                <label for="piscina">Piscina</label>
                <input id="jardin" type="checkbox" name="extras[]" value="Jardin" />
                <label for="jardin">Jard&iacute;n</label>
                <input id="garaje" type="checkbox" name="extras[]" value="Garaje" />
                <label for="garaje">Garaje</label>
                <br />
                <label for="foto">Foto:</label>
                <input id="foto" type="file" name="foto" />
                <br />
                <label for="observaciones">Observaciones:</label>
                <input id="observaciones" type="text" name="observaciones" value="<?php echo $_POST['observaciones'] ?? ''; ?>" />
                <br />
                <input type="submit" value="insertar vivienda">
            </form>
        <?php else: ?>
        
            <h1>Inserción de vivienda</h1>
            <p>Estos son los datos introducidos:</p>
            <ul>
                <?php
                    echo "<li>Tipo: $type</li>";
                    echo "<li>Zona: $zona</li>";
                    echo "<li>Direccion: $direccion</li>";
                    echo "<li>Numero dormitorios: $nDormitorios</li>";
                    echo "<li>Precio: $precio €</li>";
                    echo "<li>Tamaño: $size metros cuadrados</li>";
                    echo "<li>Extras: " . implode(', ', $extras) . "</li>";
                    echo "<li>Observaciones: $observaciones</li>";
                    echo "<li>beneficio: $beneficio</li>";
                ?>
            </ul>
            <?php 
                if (isset($_FILES['foto']) && !empty($_FILES['foto']['name'])) {
                    echo '<a href="fotos/' . $_FILES['foto']['name'] . '">Imagen aqui</a>';
                }
            ?>
            <form action="index.php" method="GET">
                    <input type="submit" name="new_one" value="Insertar otra vivienda"/>
            </form>
        <?php endif; ?>
    </main>
</body>

</html>