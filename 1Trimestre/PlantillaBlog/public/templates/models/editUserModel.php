<article class="user-outer">
    <main>
        <form class="grid-div " action="userEdit.php" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <div class="grid-name">
                <label for="user-name"><?= traduce('Name'); ?>: </label><br />
                <input id="user-name" type="text" name="name" placeholder="<?= $USER_SESSION[USER_NAME] ?? '' ?>" value="" autocomplete="new-name"/><br />

                <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['name'])): ?>
                    <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['name'] ?? ''); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="grid-surname">
                <label for="user-surname"><?= traduce('Surname'); ?>:</label><br />
                <input id="user-surname" type="text" name="surname" placeholder="<?= $USER_SESSION[USER_SURNAME] ?? '' ?>" value="" autocomplete="new-surname"/><br />
            </div>

            <div class="grid-email">
                <label for="user-email"><?= traduce('Email'); ?>:</label><br />
                <input id="user-password" type="text" name="email" placeholder="<?= $USER_SESSION[USER_EMAIL] ?? '' ?>" value="" autocomplete="new-email"/><br />
                
                <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['email'])): ?>
                    <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['email'] ?? ''); ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-password">
                <label for="user-password"><?= traduce('Password'); ?>:</label><br />
                <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" autocomplete="new-password"/><br />

                <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['password'])): ?>
                    <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['password'] ?? ''); ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-new-password">
                <label for="user-new-password"><?= traduce('New password'); ?>:</label><br />
                <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

                <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['new-password'])): ?>
                    <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['new-password'] ?? ''); ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-others">
                <?php if(isset($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['others'])): ?>
                    <p class="error"><?= traduce($DATA['errors'][SUBMIT_TYPE_EDIT_USER]['others'] ?? ''); ?></p>
                <?php endif; ?>
            </div>
            
            <div class="grid-button">
                <input id="user-btn" type="submit" value="<?= traduce('Save'); ?>" />
                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_EDIT_USER ?>" />
            </div>
        </form>
    </main>
</article>