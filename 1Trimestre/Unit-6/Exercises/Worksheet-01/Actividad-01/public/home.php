<?php
require_once('../src/services/db/DBProductos.php');

$PRODUCTS = getAllProducts();

$STOCKS = [];
if (isset($_GET['product'])) {
    $STOCKS = getProductStock($_GET['product']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <form action="home.php" method="GET">
        <label for="productos">Productos:</label><br />
        <select style="width: 200px;" id="productos" name="product">
            <?php $productId = $_POST['id'] ?? $PRODUCTS['cod'] ?? -1 ?>
            <?php foreach ($PRODUCTS as $product) : ?>
                <option value="<?= $product['cod'] ?>" <?= ($productId == $product['cod']) ? 'selected' : '' ?>>
                    <?= $product['nombre_corto'] ?>
                </option>
            <?php endforeach; ?>
        </select><br />

        <input type="submit" value="Seleccionar" />
    </form>

    <ul>
        <?php foreach ($STOCKS as $stock) : ?>
            <li>Producto: <?= $stock['producto']; ?>, Tienda: <?= $stock['tienda']; ?>, stock: <?= $stock['unidades']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>

</html>