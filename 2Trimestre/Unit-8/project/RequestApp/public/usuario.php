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
            <article class="user-outer">
                <main>
                    <form class="grid-div " action="<?= $DATA[ViewConstants::URL] ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                        <?php $USUARIO = $DATA[ViewConstants::MODEL_USUARIO]; ?>
                        <?php $ERRORS = $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS] ?? []; ?>

                        <input type="hidden" name="id" value="<?= $USUARIO->id ?>"/>

                        <div class="grid-name">
                            <label for="user-name">Name: </label><br />
                            <input id="user-name" type="text" name="name" placeholder="<?= $USUARIO->nombre ?? '' ?>" value="" autocomplete="new-name"/><br />

                            <?php if(isset($ERRORS['name'])): ?>
                                <p class="error"><?= $ERRORS['name'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid-surname">
                            <label for="user-surname">Surname:</label><br />
                            <input id="user-surname" type="text" name="surname" placeholder="<?= $USUARIO->apellidos ?? '' ?>" value="" autocomplete="new-surname"/><br />
                        </div>

                        <div class="grid-email">
                            <label for="user-email">Email:</label><br />
                            <input id="user-password" type="text" name="email" placeholder="<?= $USUARIO->email ?? '' ?>" value="" autocomplete="new-email"/><br />
                            
                            <?php if(isset($ERRORS['email'])): ?>
                                <p class="error"><?= $ERRORS['email'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-rol">
                            <?php 
                                $IS_ADMIN = $DATA[ViewConstants::SESSION_USER]->rol == Roles::$ADMIN->getId();
                                $IS_ITSELF = $DATA[ViewConstants::SESSION_USER]->id != $USUARIO->id;
                            ?>
                            <?php if ($IS_ADMIN && !$IS_ITSELF): ?>
                                <label for="user-rol">Rol:</label><br />
                                <select id="user-rol" name="rol">
                                    <?php foreach(Roles::getRoles() as $rol): ?>
                                        <option value="<?= $rol->getId() ?>" <?= ($rol->getId() == $USUARIO->rol) ? 'selected' : '' ?>><?= $rol ?></option>
                                    <?php endforeach; ?>
                                </select>
                            <?php else: ?>
                                <span>User Rol: <?= $USUARIO->rol ?? Roles::$UNDEFINED->getId(); ?></span>
                            <?php endif; ?>
                            
                            <?php if(isset($ERRORS['rol'])): ?>
                                <p class="error"><?= $ERRORS['rol'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-password">
                            <label for="user-password">Password:</label><br />
                            <input id="user-password" type="password" name="password" value="<?= $_POST['password'] ?? '' ?>" autocomplete="new-password"/><br />

                            <?php if(isset($ERRORS['password'])): ?>
                                <p class="error"><?= $ERRORS['password'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-new-password">
                            <label for="user-new-password">New password:</label><br />
                            <input id="user-new-password" type="password" name="new-password" value="<?= $_POST['new-password'] ?? '' ?>" /><br />

                            <?php if(isset($ERRORS['new-password'])): ?>
                                <p class="error"><?= $ERRORS['new-password'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="grid-others">
                            <?php if(isset($ERRORS['others'])): ?>
                                <p class="error"><?= $ERRORS['others'] ?? '' ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <div class="grid-button">
                            <input id="user-btn" type="submit" value="Save" />
                        </div>
                    </form>
                </main>
            </article>
        </section>
        <?php include('public/templates/footer.php'); ?>
    </body>
</html>