<div class="widget">
    <h2 class="title">Login</h2>
    <form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="login-email">Email:</label><br />
        <input id="login-email" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <label for="login-password">Password:</label><br />
        <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <input id="login-btn" type="submit" value="Iniciar sesi&oacute;n" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGIN ?>" />
    </form>
</div>