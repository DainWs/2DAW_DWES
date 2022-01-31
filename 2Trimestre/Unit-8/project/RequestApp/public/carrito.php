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
        <script>
            const BASE_URL = "<?= $_SERVER['APP_BASE_URL'] ?>";
            const LINEA_PRODUCT = <?= json_encode($DATA[CARRITO]) ?>;
        </script>
        <script src="https://unpkg.com/vue@next"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/libs/js/jquery.js"></script>
        <script src="<?= $_SERVER['APP_BASE_URL'] ?>/assets/js/carrito.js"></script>
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <section id="pedido">
            <article id="lineas">
                <div id="lineas__list">
                    <article v-for="linea in this.pedido.lineas" :key="linea.product_id" v-bind:id="'product-'+linea.product_id" class="product--item">
                        <div class="product--item__content">
                            <figure>
                                <img v-bind:src="getImageURL(linea.producto)" v-bind:alt="linea.producto.nombre" width="50" height="50">
                            </figure>
                            <div class="product--item__description">
                                <h3>{{linea.producto.nombre}}</h3>
                                <span>{{linea.producto.descripcion}}</span>
                            </div>
                            <div class="product--item__prices">
                                <span>{{calcOferta(linea)}}€</span>
                                <div>
                                    <button @click="removeUnit(linea)">-</button>
                                    {{linea.unidades}}
                                    <button @click="addUnit(linea)">+</button>
                                </div>
                            </div>
                            <div class="product--item__actions" @click="removeLinea(linea)">
                                <span>&times;</span>
                            </div>
                        </div>
                    </article>
                </div>
            </article>
            <aside>
                <?php if ($DATA[ViewConstants::HAS_SESSION]): ?>
                    <div class="widget">
                        <h2 class="title">Buy information</h2>
                        <form action="<?= $_SERVER['APP_BASE_URL'] . '/CarritoController/doBuyRequest'; ?>" enctype="application/x-www-form-urlencoded" method="POST" autocomplete="off">
                            <label for="provincia">Provincia:</label><br />
                            <input id="provincia" type="text" name="provincia" v-model="pedido.provincia" /><br />

                            <label for="localidad">Localidad:</label><br />
                            <input id="localidad" type="text" name="localidad" v-model="pedido.localidad" /><br />

                            <label for="direccion">Direccion:</label><br />
                            <input id="direccion" type="text" name="direccion" v-model="pedido.direccion" /><br />

                            <?php if(isset($DATA[ERRORS][CONTROLLER_SESSION_SINGING]['others'])): ?>
                                <p class="error"><?= $DATA[ERRORS][CONTROLLER_SESSION_SINGING]['others'] ?? ''; ?></p>
                            <?php endif; ?>

                            <label>Total price: {{calcTotalPrice}}&euro;</label>

                            <input type="submit" value="Buy" />
                        </form>
                    </div>
                <?php else: ?>
                    <div class="widget message">
                        <h2 class="title">Important</h2>
                        <span>Inicia sesi&oacute;n para proceder a la compra de los productos.</span>
                    </div>
                    <?php include('templates/widgets/forms/signinWidget.php'); ?>
                    <?php include('templates/widgets/forms/loginWidget.php'); ?>
                <?php endif ?>
            </aside>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
</html>