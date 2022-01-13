<article class="user-outer">
    <main>
        <form class="grid-div " action="userEdit.php" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
            <div class="grid-name">
                <label for="user-name">Name: </label><br />
                <input id="user-name" type="text" name="name" placeholder="<?= $DATA[USER_SESSION]->nombre ?? '' ?>" value="" autocomplete="new-name"/><br />

                <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['name'])): ?>
                    <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['name'] ?? '' ?></p>
                <?php endif; ?>
            </div>
            
            <div class="grid-surname">
                <label for="user-surname">Surname:</label><br />
                <input id="user-surname" type="text" name="surname" placeholder="<?= $DATA[USER_SESSION]->apellidos ?? '' ?>" value="" autocomplete="new-surname"/><br />
            </div>

            <div class="grid-email">
                <label for="user-email">Email:</label><br />
                <input id="user-password" type="text" name="email" placeholder="<?= $DATA[USER_SESSION]->email ?? '' ?>" value="" autocomplete="new-email"/><br />
                
                <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['email'])): ?>
                    <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['email'] ?? '' ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-password">
                <label for="user-password">Password:</label><br />
                <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" autocomplete="new-password"/><br />

                <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['password'])): ?>
                    <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['password'] ?? '' ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-new-password">
                <label for="user-new-password">New password:</label><br />
                <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

                <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['new-password'])): ?>
                    <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['new-password'] ?? '' ?></p>
                <?php endif; ?>
            </div>

            <div class="grid-others">
                <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['others'])): ?>
                    <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['others'] ?? '' ?></p>
                <?php endif; ?>
            </div>
            
            <div class="grid-button">
                <input id="user-btn" type="submit" value="Save" />
            </div>
        </form>
    </main>
</article>