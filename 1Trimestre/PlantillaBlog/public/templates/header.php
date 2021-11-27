<header>
    <h1>Blog de Jose Antonio Duarte</h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="home.php">Home</a></li>
            <li>
                <a>Categor&iacute;as</a>
                <ul>
                    <?php for ($i = 1; $i < 5 && $i <= count($CATEGORIAS); $i++) : ?>
                        <?php $value = $CATEGORIAS[$i]; ?>
                        <?= "<li id=\"categoria_$i\">"; ?>
                        <?= "<a href=\"categorias.php?category=$value\">$value</a>"; ?>
                        <?= "</li>"; ?>
                    <?php endfor; ?>
                </ul>
            </li>
        </ul>
        <?php if (!(isset($DATA['showSessionForms']) && $DATA['showSessionForms'])) : ?>
            <ul class="nav-profile">
                <li>
                    <a><?= $USER_SESSION[USER_NAME] ?></a>
                    <ul>
                        <li>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="Cerrar sesi&oacute;n" />
                                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>" />
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php endif; ?>
    </nav>
</header>