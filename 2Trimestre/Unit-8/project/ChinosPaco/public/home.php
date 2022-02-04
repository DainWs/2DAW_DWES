<?php
use src\domain\Roles;
use src\domain\ViewConstants; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Chinos Paco</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/nav.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/widget.css" rel="stylesheet" type="text/css" />
        <script>
            const BASE_URL = "<?= $_SERVER['APP_BASE_URL'] ?>";
        </script>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/libs/js/jquery.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/js/products.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <section>
            <article id="products">
                <div id="products-list">
                    <?php include_once('templates/models/productModel.php') ?>
                </div>
                <div id="products-navigation">
                    <button id="prevPageBtn" v-on:click="prevPage">Prev page</button>
                    <span>{{pageIndex + 1}}</span>
                    <button id="nextPageBtn" v-on:click="nextPage">Next page</button>
                </div>
            </article>
            <aside>
                <?php if ($DATA[ViewConstants::HAS_SESSION]): ?>
                    <?php if ($DATA[ViewConstants::SESSION_USER]->rol == Roles::$ADMIN->getId()): ?>
                        <?php include('templates/widgets/forms/newCategoryWidget.php'); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php include('templates/widgets/forms/signinWidget.php'); ?>
                    <?php include('templates/widgets/forms/loginWidget.php'); ?>
                <?php endif ?>
            </aside>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
</html>