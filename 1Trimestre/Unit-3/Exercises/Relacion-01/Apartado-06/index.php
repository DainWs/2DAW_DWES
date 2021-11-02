<!--
Crea un array con los nombres de 4 alumnos y sus respectivas notas.

Marta: 7,8 Luis: 5 Lorena: 6,9 …

Muestra las notas de una forma ordenada.

Alumno	Nota
Marta	7,8
Luis	5
Da la posibilidad de añadir nuevos alumnos mediante un formulario 

Muestra la media en la parte inferior.
-->
<!DOCTYPE html>
<?php 
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $nota = (isset($_POST['nota'])) ? $_POST['nota'] : '';

    $err = '';
    if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST') {
        if(empty($name) || empty($nota)) {
            $err = "Rellena los campos";
        }
        else{
            if(is_numeric($nota)) {
                if (0 > $nota && $nota > 10) {
                    $err = "La nota debe estar entre 0 y 10";
                }
            }
            else {
                $err = "La nota debe ser un numero";
            }
        }
    }
?>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <main>
        

            <?php if (!empty($err)) : ?>
                <p><?php echo $err ?></p>
            <?php endif; ?>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <?php
                    // A
                    $alumnos = [
                        ['Marta', 7.8],
                        ['Luis', 5],
                        ['Lorena', 6.9],
                        ['Jose', 9]
                    ];
                    
                    if (isset($_POST['alumnos'])) {
                        $nAlumnos = $_POST['alumnos'];
                        $hasAlumnos = [];
                        $alumnos = [];
                        foreach ($nAlumnos as $key => $value) {
                            $tempName = substr($value, 0, strrpos($value, '#'));
                            $tempNota = floatval(substr($value, strrpos($value, '#') + 1));
                            if (!array_search($tempName, $hasAlumnos)) {
                                $alumnos[$key] = [$tempName, $tempNota];
                                $hasAlumnos[$key] = $tempName;
                            }
                        }
                    }
                    
                    // D
                    if (empty($err) && !empty($name) && !empty($nota)) {
                        if (!array_search($name, $hasAlumnos)) {
                            array_push($alumnos, [$name, $nota]);
                        }
                    }
                    
                    foreach ($alumnos as $key => $value) {
                        echo "<input type=\"hidden\" name=\"alumnos[]\" value=\"$value[0]#$value[1]\">";
                    }

                    // B
                    usort($alumnos, function ($alumnoA, $alumnoB) {
                        $result = 0;
                        if ($alumnoA[1] < $alumnoB[1]) {
                            $result = -1;
                        } else if ($alumnoA[1] > $alumnoB[1]) {
                            $result = 1;
                        }
                        return $result;
                    });

                ?>
                <label for="name">name:</label><br />
                <input type="text" id="name" name="name" value="<?php echo $_POST['name'] ?? ''; ?>"><br />

                <label for="nota">nota:</label><br />
                <input type="nota" id="nota" name="nota" value="<?php echo $_POST['nota'] ?? ''; ?>"><br />

                <input type="submit" value="Submit">
            </form>
            <table>
                <tr>
                    <th>Alumno</th>
                    <th>Nota</th>
                </tr>
                <?php
                    // C
                    foreach ($alumnos as $key => $value) {
                        echo "<tr><td>{$value[0]}</td><td>{$value[1]}</td></tr>";
                    }
                ?>
            </table>

            
        </main>
    </body>
</html>