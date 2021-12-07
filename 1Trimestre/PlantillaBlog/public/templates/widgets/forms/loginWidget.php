<div class="widget">
    <h2 class="title">Login</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="login-email">Email:</label><br />
        <input id="login-email" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_LOGIN]['email'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_LOGIN]['email'] ?? '' ?></p>
        <?php endif; ?>

        <label for="login-password">Password:</label><br />
        <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_LOGIN]['password'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_LOGIN]['password'] ?? '' ?></p>
        <?php endif; ?>

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_LOGIN]['others'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_LOGIN]['others'] ?? '' ?></p>
        <?php endif; ?>

        <input id="login-btn" type="submit" value="Iniciar sesi&oacute;n" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGIN ?>" />
    </form>
</div>