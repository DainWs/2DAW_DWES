<header>
    <h1><?= $DATA['title'] ?? 'Blog de Jose Antonio Duarte' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="home.php"><?= traduce('Home'); ?></a></li>
            <li>
                <a href="categorias.php"><?= traduce('Categories'); ?></a>
                <ul>
                    <?php for ($i = 1; $i < 5 && $i < count($CATEGORIAS); $i++) : ?>
                        <?php $key = array_keys($CATEGORIAS)[$i]; ?>
                        <?php $value = $CATEGORIAS[$key]; ?>
                        <li id="categoria_<?= $key ?>">
                            <a href="categorias.php?category=<?= $key ?>"><?= $value ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </li>
            <?php if (hasSession()) : ?>
                <li class="profile">
                    <a href="user.php"><?= $USER_SESSION[USER_NAME] ?></a>
                    <ul>
                        <li><a href="userEdit.php"><?= traduce('Edit profile'); ?></a></li>
                        <li><a href="entryNew.php"><?= traduce('New post'); ?></a></li>
                        <li>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="<?= traduce('Logout'); ?>" />
                                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>" />
                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>