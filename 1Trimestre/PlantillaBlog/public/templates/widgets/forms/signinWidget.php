<div class="widget">
    <h2 class="title">Sign in</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="signin-name">Nombre:</label><br />
        <input id="signin-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'] ?? '' ?></p>
        <?php endif; ?>

        <label for="signin-surname">Apellidos:</label><br />
        <input id="signin-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>" /><br />

        <label for="signin-email">Correo Electr&oacute;nico:</label><br />
        <input id="signin-password" type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'] ?? '' ?></p>
        <?php endif; ?>

        <label for="signin-password">Contrase&ntilde;a:</label><br />
        <input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'] ?? '' ?></p>
        <?php endif; ?>

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'] ?? '' ?></p>
        <?php endif; ?>

        <input id="signin-btn" type="submit" value="Registrarse" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_SIGNIN ?>" />
    </form>
</div>