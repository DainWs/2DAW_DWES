<article class="user-outer">
    <main>
        <form action="user.php" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <label for="user-name">Nombre: </label><br />
            <input id="user-name" type="text" name="name" placeholder="<?= $USER_SESSION[USER_NAME] ?? '' ?>" value="" autocomplete="new-name"/><br />

            <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['name'])): ?>
                <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_EDIT_USER]['name'] ?? '' ?></p>
            <?php endif; ?>

            <label for="user-surname">Apellidos:</label><br />
            <input id="user-surname" type="text" name="surname" placeholder="<?= $USER_SESSION[USER_SURNAME] ?? '' ?>" value="" autocomplete="new-surname"/><br />

            <label for="user-email">Correo Electr&oacute;nico:</label><br />
            <input id="user-password" type="email" name="email" placeholder="<?= $USER_SESSION[USER_EMAIL] ?? '' ?>" value="" autocomplete="new-email"/><br />

            <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['email'])): ?>
                <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_EDIT_USER]['email'] ?? '' ?></p>
            <?php endif; ?>

            <label for="user-password">Contrase&ntilde;a:</label><br />
            <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" autocomplete="new-password"/><br />

            <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['password'])): ?>
                <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_EDIT_USER]['password'] ?? '' ?></p>
            <?php endif; ?>
            
            <label for="user-new-password">Nueva Contrase&ntilde;a:</label><br />
            <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

            <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['new-password'])): ?>
                <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_EDIT_USER]['new-password'] ?? '' ?></p>
            <?php endif; ?>

            <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['others'])): ?>
                <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_EDIT_USER]['others'] ?? '' ?></p>
            <?php endif; ?>

            <input id="user-btn" type="submit" value="Guardar" />
            <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_EDIT_USER ?>" />
        </form>
    </main>
</article>