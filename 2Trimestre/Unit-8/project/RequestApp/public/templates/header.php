<header>
    <?php 
    use src\domain\Roles;
    use src\domain\ViewConstants;
    ?>
    <h1><?= $DATA['title'] ?? 'Chinos Paco' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/home.php'; ?>">Home</a></li>
            <?php if(isset($DATA[ViewConstants::LIST_MODEL_CATEGORIAS])): ?>
                <li>
                    <a href="categorias.php">Categories</a>
                    <ul>
                        <?php for ($i = 1; $i < 12 && $i < count($DATA[ViewConstants::LIST_MODEL_CATEGORIAS]); $i++) : ?>
                            <?php $category = $DATA[ViewConstants::LIST_MODEL_CATEGORIAS][$i]; ?>
                            <li id="categoria_<?= $category->id ?>">
                                <a href="categorias.php?category=<?= $category->id ?>"><?= $category->nombre ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($DATA[ViewConstants::HAS_SESSION]) : ?>
                <?php $userRol = Roles::getById($DATA[ViewConstants::SESSION_USER]->rol ?? 'UNDEFINED'); ?>
                <?php if ($userRol->isAllowedBy(Roles::$PROVEEDOR)) : ?>
                    <li>
                        <a href="">Proveer</a>
                        <ul>
                            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/producto.php?productID=-1'; ?>">New Product</a></li>
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
                    <a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/profile.php'; ?>"><?= $DATA[ViewConstants::SESSION_USER]->nombre ?></a>
                    <ul>
                        <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/carrito.php'; ?>">Carrito</a></li>
                        <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/profile.php'; ?>">Edit profile</a></li>
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