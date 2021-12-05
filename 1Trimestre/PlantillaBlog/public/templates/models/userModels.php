<?php if (isset($USER_SESSION)) : ?>
    <article class="user-outer">
        <header>
            <h2>Profile</h2>
        </header>
        <main class="grid-div">
            <div class="grid-name">
                <span><b>Nombre:</b></span> 
                <p><?= ($USER_SESSION[USER_NAME] ?? ''); ?></p>
            </div><br/>
            <div class="grid-surname">
                <span><b>Apellidos:</b></span> 
                <p><?= ($USER_SESSION[USER_SURNAME] ?? ''); ?></p>
            </div><br/>

            <div class="grid-email">
                <span><b>Email:</b></span> 
                <p><?= $USER_SESSION[USER_EMAIL] ?? ''; ?></p>
            </div><br/>
            <div class="grid-date">
                <span><b>Fecha de inscripci&oacute;n:</b></span> 
                <p><?= date(DATE_FORMAT, strtotime($USER_SESSION[USER_DATE])); ?></p>
            </div>
        </main>
        <footer>
            <?php if (hasSession()) : ?>
                <form class="edit-buttom grid-edit" action="userEdit.php" method="GET">
                    <input type="hidden" name="userID" value="<?= $USER_SESSION[USER_ID] ?>" />
                    <input type="submit" value="Editar cuenta" />
                </form>
                <form class="delete-buttom grid-delete" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    
                    <label for="login-password">Si quieres borrar este usuario, deberas proporcionar tu contrase&ntilde;a actual:</label><br />
                    <input id="login-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" /><br />

                    <input type="hidden" name="userID" value="<?= $USER_SESSION[USER_ID] ?>" />
                    <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_DELETE_USER ?>" />
                    <input type="submit" value="Borrar cuenta" />
                </form>
            <?php endif; ?>
        </footer>
    </article>
<?php endif; ?>