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
    <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/pedidos.css" rel="stylesheet" type="text/css" />
    <script>
        const BASE_URL = "<?= $_SERVER['APP_BASE_URL'] ?>";
        const PEDIDOS = <?= json_encode($DATA[ViewConstants::LIST_MODEL_PEDIDOS] ?? []) ?>;
    </script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/libs/js/jquery.js"></script>
    <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/js/pedidos.js"></script>
</head>


<body>
    <?php include('templates/header.php'); ?>
    <section id="pedidos">
        <?php $listaPedidos = $DATA[ViewConstants::LIST_MODEL_PEDIDOS] ?? []; ?>
        <?php foreach ($listaPedidos as $key => $pedido) : ?>
            <article id="<?= $key ?>" class="pedidos__pedido">
                <div class="pedido__content" onclick="turnVisibility(<?= $key ?>)">
                    <div>
                        <span class="pedido__content--direction"><b>Direcci&oacute;n</b>: <?= "$pedido->provincia, $pedido->localidad, $pedido->direccion" ?></span>
                        <span class="pedido__content--fecha"><i><?= "$pedido->hora $pedido->fecha" ?></i></span>
                        <span class="pedido__content--estado"><b>Estado</b>: <?= $pedido->estado ?></span>
                        <span class="pedido__content--coste"><?= $pedido->coste ?>&euro;</span>
                    </div>
                    <li><i class="arrow"></i></li>
                </div>
                <ul class="pedido__lineas hide">
                    <?php foreach ($pedido->lineas as $key => $linea) : ?>
                        <li>
                            <span class="pedido__lineas--unidades">x<?= $linea->unidades ?></span>
                            <span class="pedido__lineas--nombre"><?= $linea->nombreProducto ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </section>
    <?php include('templates/footer.php'); ?>
</body>

</html>