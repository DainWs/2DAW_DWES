<div class="widget">
    <h2 class="title">Login</h2>
    <form action="<?= $_SERVER['APP_BASE_URL'] . '/SessionController/doLoginPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="login-email">Email:</label><br />
        <input id="login-email" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />
        
        <?php if(isset($DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['email'])): ?>
            <p class="error"><?= $DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['email'] ?? ''; ?></p>
        <?php endif; ?>

        <label for="login-password">Password:</label><br />
        <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['password'])): ?>
            <p class="error"><?= $DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['password'] ?? ''; ?></p>
        <?php endif; ?>

        <?php if(isset($DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['others'])): ?>
            <p class="error"><?= $DATA[ERRORS][CONTROLLER_SESSION_LOGIN]['others'] ?? ''; ?></p>
        <?php endif; ?>

        <input id="login-btn" type="submit" value="Login" />
    </form>
</div>