<!DOCTYPE html>
<html lang="en">

<head>
    <title>Request App</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
    <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/nav.css" rel="stylesheet" type="text/css" />
    <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/widget.css" rel="stylesheet" type="text/css" />
    <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/product.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <?php include('templates/header.php'); ?>
    <section>
        <article class="product-outer grid-div">
            
            <div class="grid-name">
                <h2>Name:</h2>
                <span><?= $DATA[SELECTED_PRODUCT]->nombre ?? '' ?></span>
            </div>

            <div class="grid-category">
                <h2>Category:</h2>
                <span><?= $DATA[SELECTED_CATEGORY]->nombre ?? '' ?></span>
            </div>

            <div class="grid-description">
                <h2>Description :</h2>
                <p><?= $DATA[SELECTED_PRODUCT]->descripcion ?? '' ?></p>
            </div>

            <div class="grid-price">
                <h2>Price:</h2>
                <span><?= $DATA[SELECTED_PRODUCT]->precio ?? 0 ?> €</span>
            </div>

            <div class="grid-stock">
                <h2>Stock:</h2>
                <span><?= $DATA[SELECTED_PRODUCT]->stock ?? 0 ?></span>
            </div>

            <div class="grid-oferta">
                <h2>Oferta:</h2>
                <span><?= $DATA[SELECTED_PRODUCT]->oferta ?? '' ?>%</span>
            </div>

            <div class="grid-imagen">
                <img src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/images/products/<?= $DATA[SELECTED_PRODUCT]->imagen ?? '' ?>" alt="">
            </div>

            <div class="grid-button">
                <?php if ($DATA[HAS_SESSION]): ?>
                    <?php $userRol = $DATA[USER_SESSION]->rol; ?>

                    <?php if ($userRol == ROL_PROVEEDOR || $userRol == ROL_ADMIN) : ?>
                        <a href="<?= $_SERVER['APP_BASE_URL'] ?>/proveedores/newProduct.php">Edit product</a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </article>
    </section>
    <?php include('templates/footer.php'); ?>
</body>

</html>