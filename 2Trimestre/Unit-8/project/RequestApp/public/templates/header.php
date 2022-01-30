<header>
    <?php use src\domain\Roles; ?>
    <h1><?= $DATA['title'] ?? 'Chinos Paco' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/home.php'; ?>">Home</a></li>
            <?php if ($DATA[HAS_SESSION]) : ?>
                <?php $userRol = Roles::getById($DATA[USER_SESSION]->rol ?? 'UNDEFINED'); ?>
                <?php if ($userRol->isAllowedBy(Roles::$PROVEEDOR)) : ?>
                    <li>
                        <a href="">Proveer</a>
                        <ul>
                            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/proveedores/Productos.php'; ?>">New Product</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
                <?php if ($userRol->isAllowedBy(Roles::$ADMIN)) : ?>
                    <li>
                        <a href="">Administration</a>
                        <ul>
                            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/administration/newUser.php'; ?>">New User</a></li>
                        </ul>
                    </li>
                <?php endif; ?>

                <li class="profile">
                    <a href="user.php"><?= $DATA[USER_SESSION]->nombre ?></a>
                    <ul>
                        <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/carrito.php'; ?>">Carrito</a></li>
                        <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/profile/editProfile.php'; ?>">Edit profile</a></li>
                        <li>
                            <form action="<?= $_SERVER['APP_BASE_URL'] . '/SessionController/doLogoutPost'; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="Logout" />
                            </form>
                        </li>
                    </ul>
                </li>
            <?php else: ?>
                <li class="profile">
                    <a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/carrito.php'; ?>">Carrito</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>