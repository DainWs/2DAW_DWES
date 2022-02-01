<?php
use src\domain\Roles;
use src\domain\ViewConstants;
?>
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
                $isAdmin = $DATA[ViewConstants::SESSION_USER]->rol == Roles::$ADMIN->getId();
                $isItself = $DATA[ViewConstants::SESSION_USER]->id != $DATA[ViewConstants::MODEL_USUARIO]->id;
            ?>
            <article class="user-outer">
                <main>
                    <form class="grid-div " action="<?= $_SERVER['APP_BASE_URL'] . '/UsuariosController/doEditUserPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                        <div class="grid-name">
                            <label for="user-name">Name: </label><br />
                            <input id="user-name" type="text" name="name" placeholder="<?= $DATA[ViewConstants::MODEL_USUARIO]->nombre ?? '' ?>" value="" autocomplete="new-name"/><br />

                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['name'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['name'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid-surname">
                            <label for="user-surname">Surname:</label><br />
                            <input id="user-surname" type="text" name="surname" placeholder="<?= $DATA[ViewConstants::MODEL_USUARIO]->apellidos ?? '' ?>" value="" autocomplete="new-surname"/><br />
                        </div>

                        <div class="grid-email">
                            <label for="user-email">Email:</label><br />
                            <input id="user-password" type="text" name="email" placeholder="<?= $DATA[ViewConstants::MODEL_USUARIO]->email ?? '' ?>" value="" autocomplete="new-email"/><br />
                            
                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['email'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['email'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-rol">
                            <label for="user-rol">Rol:</label><br />
                            <select id="user-rol" name="rol">
                                <?php foreach(Roles::getRoles() as $rol): ?>
                                    <option value="<?= $rol->getId() ?>" <?= ($rol->getId() == $DATA[ViewConstants::MODEL_USUARIO]->rol->getId()) ? 'selected' : '' ?>><?= $rol->getId() ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['rol'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['rol'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-password">
                            <label for="user-password">Password:</label><br />
                            <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" autocomplete="new-password"/><br />

                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['password'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['password'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-new-password">
                            <label for="user-new-password">New password:</label><br />
                            <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['new-password'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['new-password'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-others">
                            <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['others'])): ?>
                                <p class="error"><?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['others'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid-button">
                            <input id="user-btn" type="submit" value="Save" />
                            <input type="hidden" name="id" value="<?= $DATA[ViewConstants::MODEL_USUARIO]->id ?>"/>
                        </div>
                    </form>
                </main>
            </article>
        </section>
        <?php include('public/templates/footer.php'); ?>
    </body>
</html>