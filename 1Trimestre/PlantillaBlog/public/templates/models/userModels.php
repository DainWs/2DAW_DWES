<?php if (isset($USER_SESSION)) : ?>
    <article class="user-outer">
        <header>
            <h2><?= traduce('Profile'); ?></h2>
        </header>
        <main class="grid-div">
            <div class="grid-name">
                <span><b><?= traduce('Name'); ?>:</b></span> 
                <p><?= ($USER_SESSION[USER_NAME] ?? ''); ?></p>
            </div><br/>
            <div class="grid-surname">
                <span><b><?= traduce('Surname'); ?>:</b></span> 
                <p><?= ($USER_SESSION[USER_SURNAME] ?? ''); ?></p>
            </div><br/>

            <div class="grid-email">
                <span><b><?= traduce('Email'); ?>:</b></span> 
                <p><?= $USER_SESSION[USER_EMAIL] ?? ''; ?></p>
            </div><br/>
            <div class="grid-date">
                <span><b><?= traduce('Registration date'); ?>:</b></span> 
                <p><?= date(DATE_FORMAT, strtotime($USER_SESSION[USER_DATE])); ?></p>
            </div>
        </main>
        <footer>
            <?php if (hasSession()) : ?>
                <form class="edit-buttom" action="userEdit.php" method="GET">
                    <input type="hidden" name="userID" value="<?= $USER_SESSION[USER_ID] ?>" />
                    <input type="submit" value="<?= traduce('Edit profile'); ?>" />
                </form>
                <form class="logout-buttom" action="home.php" method="POST">
                    <input id="logout-btn" type="submit" value="<?= traduce('Logout'); ?>" />
                    <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>" />
                </form>
                <form class="delete-buttom" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="login-password"><?= traduce('If you want to delete this user, you must provide your current password'); ?>:</label><br />
                    <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

                    <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_DELETE_USER ?>" />
                    <input type="submit" value="<?= traduce('Delete account'); ?>" />
                </form>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>