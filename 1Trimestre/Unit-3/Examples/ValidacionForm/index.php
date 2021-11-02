<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="result.php" method="POST">
            <label for="name">Nombre:</label>
            <input id="name" type="text" name="name" size="20" maxlength="20" pattern="[a-zA-Z]+" value="<?= $_POST['name'] ?? ''; ?>" required/>
            <br/>
            <label for="surnames">Apellidos:</label>
            <input id="surnames" type="text" name="surnames" size="20" maxlength="20" pattern="[a-zA-Z\s]+" value="<?= $_POST['surnames'] ?? ''; ?>" required/>
            <br/>
            <label for="age">Edad:</label>
            <input id="age" type="number" name="age" value="<?= $_POST['age'] ?? 0; ?>" required/>
            <br/>
            <label for="email">Email:</label>
            <input id="email" type="text" name="email" value="<?= $_POST['email'] ?? ""; ?>" required/>
            <br/>
            <input type="submit" value="Submit"/>
        </form>
        <br/>

        <?php if (isset($_GET['error'])): ?>
            <section>
                <header>Errores</header>
                <p><?= $_GET['error'] ?></p>
            </section>
        <?php endif; ?>
    </body>
</html>