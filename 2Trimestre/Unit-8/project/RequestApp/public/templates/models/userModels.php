<?php if ($DATA[HAS_SESSION]) : ?>
    <article class="user-outer">
        <header>
            <h2>Profile</h2>
        </header>
        <main class="grid-div">
            <div class="grid-name">
                <span><b>Name:</b></span> 
                <p><?= ($DATA[USER_SESSION]->nombre ?? ''); ?></p>
            </div><br/>
            <div class="grid-surname">
                <span><b>Surname:</b></span> 
                <p><?= ($DATA[USER_SESSION]->apellidos ?? ''); ?></p>
            </div><br/>

            <div class="grid-email">
                <span><b>Email:</b></span> 
                <p><?= $DATA[USER_SESSION]->email ?? ''; ?></p>
            </div><br/>
            <div class="grid-date">
                <span><b>Rol:</b></span> 
                <p><?= $DATA[USER_SESSION]->rol ?? 'Cliente' ?></p>
            </div>
        </main>
        <footer>
            <?php if (hasSession()) : ?>
                <form class="edit-buttom" action="userEdit.php" method="GET">
                    <input type="hidden" name="userID" value="<?= $DATA[USER_SESSION]->id ?>" />
                    <input type="submit" value="Edit profile" />
                </form>
                <form class="logout-buttom" action="home.php" method="POST">
                    <input id="logout-btn" type="submit" value="Logout" />
                </form>
                <form class="delete-buttom" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <label for="login-password">If you want to delete this user, you must provide your current password:</label><br />
                    <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

                    <input type="submit" value="Delete account" />
                </form>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>