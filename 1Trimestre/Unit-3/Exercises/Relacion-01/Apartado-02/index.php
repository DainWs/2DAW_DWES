<!--
Vamos a modificar el formulario de login.
El nuevo formulario se encarga de comprobar los datos introducidos y,
según sean correctos o no, da acceso al sistema al usuario o muestra
un mensaje de error. Un fichero con un script php se encarga de procesar
un formulario de login. 

Como aún no usamos bases de datos simularemos un formulario de login donde
hay que comprobar que el usuario y la contraseña son correctos. Si el usuario
es "usuario" y la clave es "1234", se redirige a la página de bienvenida. 

En caso contrario, lo hace a una página de error. 
Para la redirección usa la función header(), que sirve para escribir en la cabecera de la respuesta HTTP.
Hay que enviar las cabeceras antes de empezar con el cuerpo
de la respuesta. Esto implica que hay que utilizar la función header()
antes de que se empiece a escribir la salida. Si se intenta llamar a header()
después de haber realizado un echo, se producirá un error.
-->
<?php 
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    if (isset($_POST['password'])) {
        $password == $_POST['password'];
    }

    $err = '';
    if(!empty($username) || !empty($password)) {
        if($username === 'usuario' && $password === 'usuario') {
            header("Location: home.php");
        }
        else { $err = "Revisar usuario y contrasenia"; }
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <main>
            <?php if (!empty($err)) : ?>
                <p><?php echo $err ?></p>
            <?php endif; ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Username:</label><br/>
                <input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?? ''; ?>"><br/>

                <label for="password">Password:</label><br/>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>"><br/><br/>

                <input type="submit" value="Submit">
            </form> 
        </main>
    </body>
</html>