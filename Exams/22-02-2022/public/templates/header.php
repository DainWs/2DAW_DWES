<header>
    <?php 
    use exam\src\domain\ViewConstants;
    ?>
    <h1><?= $DATA['title'] ?? '20/02/2022 Exam' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="<?= $_SERVER['APP_BASE_URL'] . '/moveTo/home.php'; ?>">Home</a></li>
            <?php /*if(isset($DATA[ViewConstants::LIST_MODEL_CATEGORIAS])): ?>
                <li>
                    <a>Categories</a>
                    <ul>
                        <?php for ($i = 1; $i < 12 && $i < count($DATA[ViewConstants::LIST_MODEL_CATEGORIAS]); $i++) : ?>
                            <?php $category = $DATA[ViewConstants::LIST_MODEL_CATEGORIAS][$i]; ?>
                            <li id="categoria_<?= $category->id ?>">
                                <a href="<?= $_SERVER['APP_BASE_URL'] . "/moveTo/home.php?category=$category->id" ?>"><?= $category->nombre ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </li>
            <?php endif;*/ ?>
            <?php if ($DATA[ViewConstants::HAS_SESSION]) : ?>
                <li class="profile">
                    <a href="<?= ''/*$_SERVER['APP_BASE_URL'] . '/moveTo/profile.php';*/ ?>"><?= $DATA[ViewConstants::SESSION_USER]->nombre ?></a>
                    <ul>
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