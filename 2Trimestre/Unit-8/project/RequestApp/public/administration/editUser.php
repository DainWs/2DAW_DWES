<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Request App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/nav.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/widget.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/users.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include('public/templates/header.php'); ?>
        <section>
            <?php 
                $isAdmin = $DATA[USER_SESSION]->rol == ROL_ADMIN;
                $isItself = $DATA[USER_SESSION]->id != $DATA[SELECTED_USER]->id;
            ?>
            <article class="user-outer">
                <main>
                    <form class="grid-div " action="<?= $_SERVER['APP_BASE_URL'] . '/UsuariosController/doEditUserPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                        <div class="grid-name">
                            <label for="user-name">Name: </label><br />
                            <input id="user-name" type="text" name="name" placeholder="<?= $DATA[SELECTED_USER]->nombre ?? '' ?>" value="" autocomplete="new-name"/><br />

                            <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['name'])): ?>
                                <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['name'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid-surname">
                            <label for="user-surname">Surname:</label><br />
                            <input id="user-surname" type="text" name="surname" placeholder="<?= $DATA[SELECTED_USER]->apellidos ?? '' ?>" value="" autocomplete="new-surname"/><br />
                        </div>

                        <div class="grid-email">
                            <label for="user-email">Email:</label><br />
                            <input id="user-password" type="text" name="email" placeholder="<?= $DATA[SELECTED_USER]->email ?? '' ?>" value="" autocomplete="new-email"/><br />
                            
                            <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['email'])): ?>
                                <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['email'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-rol">
                            <label for="user-rol">Rol:</label><br />
                            <select id="user-rol" name="rol">
                                <?php foreach(ROLES as $rol): ?>
                                    <option value="<?= $rol ?>" <?= ($rol == $DATA[SELECTED_USER]->rol) ? 'selected' : '' ?>><?= $rol ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(isset($DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['rol'])): ?>
                                <p class="error"><?= $DATA[ERRORS][CONTROLLER_USUARIOS_EDIT]['rol'] ?? '' ?></p>
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
                            <input type="hidden" name="id" value="<?= $DATA[SELECTED_USER]->id ?>"/>
                        </div>
                    </form>
                </main>
            </article>
        </section>
        <?php include('public/templates/footer.php'); ?>
    </body>
</html>