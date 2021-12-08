<header>
    <h1>Blog de Jose Antonio Duarte</h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="home.php">Home</a></li>
            <li>
                <a>Categor&iacute;as</a>
                <ul>
                    <?php for ($i = 1; $i < 5 && $i < count($CATEGORIAS); $i++) : ?>
                        <?php $value = $CATEGORIAS[$i]; ?>
                        <li id="categoria_<?= $i ?>">
                            <a href="categorias.php?category=<?= $i ?>"><?= $value ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </li>
            <?php if (hasSession()) : ?>
                <li class="profile">
                    <a href="user.php"><?= $USER_SESSION[USER_NAME] ?></a>
                    <ul>
                        <li><a href="userEdit.php">Editar perfil</a></li>
                        <li><a href="entryNew.php">Nueva entrada</a></li>
                        <li>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="Cerrar sesi&oacute;n" />
                                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>" />
                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>