<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Request App</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/nav.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/widget.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/users.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <section>
            <article class="product-outer">
                <main>
                        <div>
                            <h2>Name:</h2>
                            <span><?=$DATA[SELECTED_PRODUCT]->nombre ?? '' ?></span>
                        </div>

                        <div>
                            <h2>Category:</h2>
                            <span><?= $DATA[SELECTED_CATEGORY]->nombre ?? '' ?></span>
                        </div>

                        <div>
                            <h2>Description :</h2>
                            <p><?= $DATA[SELECTED_PRODUCT]->descripcion ?? '' ?></p>
                        </div>

                        <div>
                            <h2>Price:</h2>
                            <span><?= $DATA[SELECTED_PRODUCT]->precio ?? 0 ?> €</span>
                        </div>

                        <div>
                            <h2>Stock:</h2>
                            <span><?= $DATA[SELECTED_PRODUCT]->stock ?? 0 ?></span>
                        </div>

                        <div>
                            <h2>Oferta:</h2>
                            <span><?= $DATA[SELECTED_PRODUCT]->oferta ?? '' ?>%</span>
                        </div>

                        <div>
                            <h2 for="product-image">Imagen:</h2><br />
                            <input type="file" id="product-image" name="image" value="">

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['others'])) : ?>
                            <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['others'] ?? ''; ?></p>
                        <?php endif; ?>
                    </form>
                </main>
            </article>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
</html>