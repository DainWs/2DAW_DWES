<form action="<?= $_SERVER['PHP_SELF']; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="signin-name"><?= traduce('Name'); ?>:</label><br />
        <input id="signin-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'])): ?>
            <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_SIGNIN]['name'] ?? ''); ?></p>
        <?php endif; ?>

        <label for="signin-surname"><?= traduce('Surname'); ?>:</label><br />
        <input id="signin-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>" /><br />

        <label for="signin-email"><?= traduce('Email'); ?>:</label><br />
        <input id="signin-password" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'])): ?>
            <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_SIGNIN]['email'] ?? ''); ?></p>
        <?php endif; ?>

        <label for="signin-password"><?= traduce('Password'); ?>:</label><br />
        <input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'])): ?>
            <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_SIGNIN]['password'] ?? ''); ?></p>
        <?php endif; ?>

        <?php if(isset($DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'])): ?>
            <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_SIGNIN]['others'] ?? ''); ?></p>
        <?php endif; ?>

        <input id="signin-btn" type="submit" value="<?= traduce('Sign in'); ?>" />
        <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_SIGNIN ?>" />
    </form>