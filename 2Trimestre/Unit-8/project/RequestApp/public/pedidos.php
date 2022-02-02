<?php
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
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <section id="pedido">
            <article id="lineas">
                <div id="lineas__list">
                    <?php foreach($DATA[ViewConstants::LIST_MODEL_PEDIDOS] as $key => $pedido): ?>
                        <article id="<?= $key ?>">
                            <div>
                                <span>Provincia: <?= $pedido->provincia ?></span>
                                <span>Localidad: <?= $pedido->localidad ?></span>
                                <span>Direccion: <?= $pedido->direccion ?></span><br>
                                <span>Coste: <?= $pedido->coste ?></span>
                                <span>Estado: <?= $pedido->estado ?></span>
                                <span>Fecha: <?= "$pedido->fecha $pedido->hora" ?></span>
                            </div>
                            <ul>
                                <?php foreach($pedido->lineas as $key => $linea): ?>
                                    <li>Producto: <?= $linea->nombreProducto ?>, Unidades: <?= $linea->unidades ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </article>
                    <?php endforeach; ?>
                </div>
            </article>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
</html>