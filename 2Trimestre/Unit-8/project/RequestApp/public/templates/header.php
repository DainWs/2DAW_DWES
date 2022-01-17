<header>
    <h1><?= $DATA['title'] ?? 'Tienda de Jose Antonio Duarte' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/NavigationController/home'; ?>">Home</a></li>
            <?php if ($DATA[HAS_SESSION]) : ?>
                <li class="profile">
                    <a href="user.php"><?= $DATA[USER_SESSION]->nombre ?></a>
                    <ul>
                        <li><a href="userEdit.php">Edit profile</a></li>
                        <li>
                            <form action="<?= $_SERVER['APP_BASE_URL'] . '/SessionController/doLogoutPost'; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="Logout" />
                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>