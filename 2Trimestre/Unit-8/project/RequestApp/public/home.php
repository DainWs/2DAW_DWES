<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Request App</title>
        <?php include('templates/head.php'); ?>
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
                <?php if ($DATA[HAS_SESSION]): ?>
                    <?php if ($DATA[USER_SESSION]->rol == ROL_ADMIN): ?>
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