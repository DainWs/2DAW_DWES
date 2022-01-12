<div class="widget">
    <h2 class="title">Registration</h2>
    <form action="<?= $_SERVER['APP_BASE_URL'] . '/SessionController/doSigninPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="signin-name">Name:</label><br />
        <input id="signin-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'] ?? ''; ?></p>
        <?php endif; ?>

        <label for="signin-surname">Surname:</label><br />
        <input id="signin-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>" /><br />

        <label for="signin-email">Email:</label><br />
        <input id="signin-password" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'] ?? ''; ?></p>
        <?php endif; ?>

        <label for="signin-password">Password:</label><br />
        <input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'] ?? ''; ?></p>
        <?php endif; ?>

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'])): ?>
            <p class="error"><?= $DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'] ?? ''; ?></p>
        <?php endif; ?>

        <input id="signin-btn" type="submit" value="Sign in" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_SIGNIN ?>" />
    </form>
</div>