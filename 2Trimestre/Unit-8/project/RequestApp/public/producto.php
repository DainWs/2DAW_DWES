<?php 
use src\domain\ViewConstants;
use src\models\Categorias;
use src\models\Productos;
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
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/users.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include('public/templates/header.php'); ?>
        <section>
            <article class="product-outer">
                <main>
                    <form action="<?= $DATA[ViewConstants::URL] ?>" enctype="multipart/form-data" method="POST" autocomplete="off">
                        <?php $PRODUCT = $DATA[ViewConstants::MODEL_PRODUCTO] ?? new Productos(); ?>
                        <?php $ERRORS = $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_PRODUCT] ?? []; ?>

                        <input type="hidden" name="id" value="<?= $PRODUCT->id ?? -1 ?>">
                        <div>
                            <label for="product-name">Name:</label><br />
                            <input id="product-name" type="text" name="name" value="<?= $_POST['name'] ?? $PRODUCT->nombre ?? '' ?>" /><br />

                            <?php if (isset($ERRORS['name'])): ?>
                                <p class="error"><?= $ERRORS['name'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-category">Category:</label><br />
                            <select id="product-category" name="category">
                                <?php $currentCategoryID = $PRODUCT->categoria_id ?? 0; ?>
                                <?php foreach ($DATA[ViewConstants::LIST_MODEL_CATEGORIAS] as $category) : ?>
                                    <option value="<?= $category->id ?>" <?= ($currentCategoryID == $category->id) ? 'selected' : '' ?>>
                                        <?= $category->nombre ?>
                                    </option>
                                <?php endforeach; ?>
                            </select><br />

                            <?php if (isset($ERRORS['category'])) : ?>
                                <p class="error"><?= $ERRORS['category'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="flex-grow textarea-div">
                            <label for="product-description">Description :</label><br>
                            <textarea id="product-description" name="description"><?= $_POST['description'] ?? $PRODUCT->descripcion ?? '' ?></textarea>
                        </div>

                        <div>
                            <label for="product-price">Price:</label><br />
                            <input id="product-price" type="number" name="price" min="0" value="<?= $_POST['price'] ?? $PRODUCT->precio ?? 0.0 ?>"/>

                            <?php if (isset($ERRORS['price'])) : ?>
                                <p class="error"><?= $ERRORS['price'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-stock">Stock:</label><br />
                            <input id="product-stock" type="number" name="stock" min="0" value="<?= $_POST['stock'] ?? $PRODUCT->stock ?? 0 ?>"/>

                            <?php if (isset($ERRORS['stock'])) : ?>
                                <p class="error"><?= $ERRORS['stock'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-oferta">Oferta:</label><br />
                            <input id="product-oferta" type="number" name="oferta" min="0" max="100" value="<?= $_POST['oferta'] ?? $PRODUCT->oferta ?? 0 ?>"/>

                            <?php if (isset($ERRORS['oferta'])) : ?>
                                <p class="error"><?= $ERRORS['oferta'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="product-image">Imagen:</label><br/>
                            <img src="<?= $_SERVER['APP_BASE_URL'] . '/assets/images/products/' . ($PRODUCT->imagen ?? 'unknown.png') ?>" width="100" height="100">
                            <input type="file" id="product-image" name="image" value="<?= $_FILES['image'] ?? '' ?>">

                            <?php if (isset($ERRORS['image'])) : ?>
                                <p class="error"><?= $ERRORS['image'] ?? ''; ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if (isset($ERRORS['others'])) : ?>
                            <p class="error"><?= $ERRORS['others'] ?? ''; ?></p>
                        <?php endif; ?>

                        <input id="product-modify" type="submit" value="Save" />
                    </form>
                </main>
            </article>
        </section>
        <?php include('public/templates/footer.php'); ?>
    </body>
</html>