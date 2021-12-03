<article class="user-outer">
    <main>
        <form action="user.php" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <label for="user-name">Nombre:</label><br />
            <input id="user-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" /><br />

            <label for="user-surname">Apellidos:</label><br />
            <input id="user-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>" /><br />

            <label for="user-email">Correo Electr&oacute;nico:</label><br />
            <input id="user-password" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

            <label for="user-password">Contrase&ntilde;a:</label><br />
            <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

            <label for="user-new-password">Nueva Contrase&ntilde;a:</label><br />
            <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

            <input id="user-btn" type="submit" value="Guardar" />
            <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_EDIT_USER ?>" />
        </form>
    </main>
</article>