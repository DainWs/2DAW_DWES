<?php if (isset($USER_SESSION)) : ?>
    <article class="user-outer">
        <main>
            <h2>Profile</h2>
            <span>Nombre: <?= ($USER_SESSION[USER_NAME] ?? ''); ?></span>
            <span>Apellidos: <?= ($USER_SESSION[USER_SURNAME] ?? ''); ?></span>

            <span>Email: <?= $USER_SESSION[USER_EMAIL] ?? ''; ?></span><br />
            <span>Fecha de inscripci&oacute;n: <?= date(DATE_FORMAT, strtotime($USER_SESSION[USER_DATE])); ?> </span>

            <?php if (hasSession()) : ?>
                <form class="edit-buttom" action="userEdit.php" method="GET">
                    <input type="hidden" name="userID" value="<?= $USER_SESSION[USER_ID] ?>" />
                    <input type="submit" value="Edit" />
                </form>
                <form class="delete-buttom" action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                    <input type="hidden" name="userID" value="<?= $USER_SESSION[USER_ID] ?>" />
                    <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_DELETE_USER ?>" />
                    <input type="submit" value="Borrar" />
                </form>
            <?php endif; ?>
        </main>
    </article>
<?php endif; ?>