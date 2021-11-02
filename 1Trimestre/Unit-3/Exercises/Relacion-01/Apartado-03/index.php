<!--
Modifica el ejercicio anterior para que el formulario HTML y el bloque PHP
 que lo procesa se integren en un solo fichero.
Ahora hay que distinguir entre dos casos: 
cuando se accede al formulario para rellenarlo 
y cuando se envía para procesarlo.

Cuando se accede a la página usando el método GET, es decir , 
introduciendo la dirección en el navegador, al seguir un 
vínculo como resultado de una redirección con un header(Location:), 
se muestra el formulario. En cambio, si se accede mediante POST 
quiere decir que el cliente está enviando el formulario. 
Se puede diferenciar entre los dos métodos de acceso consultando 
$_SERVER["REQUEST_METHOD"].

Cuando un formulario llama al mismo fichero se recomienda usar:
en lugar del nombre del fichero. 
-->
<?php 
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    if (isset($_POST['password'])) {
        $password == $_POST['password'];
    }

    $err = '';
    if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST') {
        if(!empty($username) || !empty($password)) {
            if($username != 'usuario' || $password != 'usuario') {
                $err = "Revisar usuario y contrasenia";
            }
        }
        else {
            $err = "Rellena los campos";
        }
    }
    
    
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <main>
            <?php if ((strtoupper($_SERVER["REQUEST_METHOD"]) == 'GET') || !empty($err)): ?>
                <?php if (!empty($err)) : ?>
                    <p><?php echo $err ?></p>
                <?php endif; ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                    <label for="username">Username:</label><br/>
                    <input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?? ''; ?>"><br/>

                    <label for="password">Password:</label><br/>
                    <input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>"><br/><br/>

                    <input type="submit" value="Submit">
                </form>
            <?php else : ?>
                <?php 
                    echo 'Buenos dias'; 
                ?>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
                    <input type="submit" value="Sign out"/>
                </form>
            <?php endif ?>
        </main>
    </body>
</html>