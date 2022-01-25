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
        <?php include('public/templates/header.php'); ?>
        <section>
            <article class="product-outer">
                <main>
                    <form action="<?= $_SERVER['APP_BASE_URL'] . '/ProductController/doAddProductPost'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                        <input type="hidden" name="id" value="<?= $DATA[SELECTED_PRODUCT]->id ?? 0 ?>">
                        <div>
                            <label for="product-name">Name:</label><br />
                            <input id="product-name" type="text" name="name" value="<?= $_POST['name'] ?? $DATA[SELECTED_PRODUCT]->nombre ?? '' ?>" /><br />

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['name'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['name'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-category">Category:</label><br />
                            <select id="product-category" name="category">
                                <?php $selectedCategory = $DATA[SELECTED_PRODUCT]->categoria_id ?? 0; ?>
                                <?php foreach ($DATA[CATEGORIES] as $category) : ?>
                                    <option value="<?= $category->id ?>" <?= ($selectedCategory == $category->id) ? 'selected' : '' ?>>
                                        <?= $category->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br />

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['category'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['category'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex-grow textarea-div">
                            <label for="product-description">Description :</label><br>
                            <textarea id="product-description" name="description"><?= $_POST['description'] ?? $DATA[SELECTED_PRODUCT]->descripcion ?? '' ?></textarea>
                        </div>

                        <div>
                            <label for="product-price">Price:</label><br />
                            <input id="product-price" type="number" name="price" min="0" value="<?= $_POST['price'] ?? $DATA[SELECTED_PRODUCT]->precio ?? 0 ?>"/>

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['price'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['price'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-stock">Stock:</label><br />
                            <input id="product-stock" type="number" name="stock" min="0" value="<?= $_POST['stock'] ?? $DATA[SELECTED_PRODUCT]->stock ?? 0 ?>"/>

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['stock'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['stock'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-oferta">Oferta:</label><br />
                            <input id="product-oferta" type="number" name="oferta" min="0" max="100" value="<?= $_POST['oferta'] ?? $DATA[SELECTED_PRODUCT]->oferta ?? 0 ?>"/>

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-image">Imagen:</label><br />
                            <input type="file" id="product-image" name="image" value="">

                            <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'])) : ?>
                                <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['oferta'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($DATA['errors'][CONTROLLER_PRODUCT_NEW]['others'])) : ?>
                            <p class="error"><?= $DATA['errors'][CONTROLLER_PRODUCT_NEW]['others'] ?? ''; ?></p>
                        <?php endif; ?>

                        <input id="product-modify" type="submit" value="Save" />
                        <?php if (isset($DATA[SELECTED_PRODUCT])) : ?>
                            <input class="normal" type="button" value="Go back" onclick="window.location='<?= $_SERVER['APP_BASE_URL'] . '/moveTo/proveedores/product.php?id=' . $DATA[SELECTED_PRODUCT]->id; ?>'"/>
                            <input type="hidden" name="entryId" value="<?= $DATA[SELECTED_PRODUCT]->id ?>" />
                        <?php endif; ?>
                    </form>
                </main>
            </article>
        </section>
        <?php include('public/templates/footer.php'); ?>
    </body>
</html>