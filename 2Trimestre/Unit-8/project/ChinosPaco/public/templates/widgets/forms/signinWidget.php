<?php
use src\domain\ViewConstants;
?>
<div class="widget">
    <h2 class="title">Registration</h2>
    <form action="<?= $_SERVER['APP_BASE_URL'] . '/SessionController/doSigningPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
        <label for="signin-name">Name:</label><br />
        <input id="signin-name" type="text" name="name" value="<?= $_POST['name'] ?? '' ?>" /><br />

        <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['name'])): ?>
            <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['name'] ?? ''; ?></p>
        <?php endif; ?>

        <label for="signin-surname">Surname:</label><br />
        <input id="signin-surname" type="text" name="surname" value="<?= $_POST['surname'] ?? '' ?>" /><br />

        <label for="signin-email">Email:</label><br />
        <input id="signin-email" type="text" name="email" value="<?= $_POST['email'] ?? '' ?>" /><br />

        <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['email'])): ?>
            <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['email'] ?? ''; ?></p>
        <?php endif; ?>

        <label for="signin-password">Password:</label><br />
        <input id="signin-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

        <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['password'])): ?>
            <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['password'] ?? ''; ?></p>
        <?php endif; ?>

        <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['others'])): ?>
            <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_SESSION_SINGING]['others'] ?? ''; ?></p>
        <?php endif; ?>

        <input id="signin-btn" type="submit" value="Sign in" />
    </form>
</div>