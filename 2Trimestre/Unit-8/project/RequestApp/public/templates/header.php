<?php 
use src\domain\SessionManager;
?>
<header>
    <h1><?= $DATA['title'] ?? 'Blog de Jose Antonio Duarte' ?></h1>
    <nav>
        <ul class="nav-menu">
            <li><a href="home.php">Home</a></li>
            <li>
                <a href="categorias.php">Categories</a>
                <ul>
                    
                </ul>
            </li>
            <?php if (SessionManager::getInstance()->hasSession()) : ?>
                <li class="profile">
                    <a href="user.php"><?= $USER_SESSION[USER_NAME] ?></a>
                    <ul>
                        <li><a href="userEdit.php">Edit profile</a></li>
                        <li><a href="entryNew.php">New post</a></li>
                        <li>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input id="logout-btn" type="submit" value="Logout" />
                                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_LOGOUT ?>" />
                            </form>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>