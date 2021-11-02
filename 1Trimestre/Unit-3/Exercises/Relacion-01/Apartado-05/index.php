<!--
Se pide un formulario que:
solicite los siguientes datos: nombre, teléfono y email .
al pulsar el botón enviar muestre la siguiente página.
“¡Buenos días, nombre!
Te voy a enviar spam a correo y te llamaré de madrugada a telefono.
Enviado desde un iPhone”
-->
<?php 
    $name = (isset($_POST['name'])) ? $_POST['name'] : '';
    $mail = (isset($_POST['mail'])) ? $_POST['mail'] : '';
    $tel = (isset($_POST['tel'])) ? $_POST['tel'] : '';

    $err = '';
    if (strtoupper($_SERVER["REQUEST_METHOD"]) == 'POST') {
        if(empty($name) || empty($mail) || empty($tel)) {
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
                    <label for="name">name:</label><br/>
                    <input type="text" id="name" name="name" value="<?php echo $_POST['name'] ?? ''; ?>"><br/>

                    <label for="mail">mail:</label><br/>
                    <input type="mail" id="mail" name="mail" value="<?php echo $_POST['mail'] ?? ''; ?>"><br/>

                    <label for="tel">phone:</label><br/>
                    <input type="tel" id="tel" name="tel" value="<?php echo $_POST['tel'] ?? ''; ?>"><br/><br/>

                    <input type="submit" value="Submit">
                </form>
            <?php else : ?>
                <p>¡Buenos d&iacute;as, <strong><?php echo $_POST['name'] ?? ''; ?></strong>!</p>
                <p>Te voy a enviar spam a <strong><?php echo $_POST['mail'] ?? ''; ?></strong> y te llamar&eacute; de madrugada a <strong><?php echo $_POST['tel'] ?? ''; ?></strong>.</p>
            <?php endif ?>
        </main>
    </body>
</html>