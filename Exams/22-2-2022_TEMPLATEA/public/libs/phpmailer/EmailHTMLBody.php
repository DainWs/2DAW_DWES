Hi Mr/s <?= '' ?>,<br />
Enviamos este correo para informarle que ha comprado los siguientes productos:<br />
<table style="border: 2px solid black; border-collapse: collapse;">
    <tr>
        <th style="border: 2px solid black;">Nombre</th>
        <th style="border: 2px solid black;">Descripci&oacute;n</th>
        <th style="border: 2px solid black;">Unidades</th>
        <th style="border: 2px solid black;">Precio Total</th>
    </tr>
    <?php /*foreach($pedido->getLineas() as $linea): ?>
        <?php $product = $linea->getProducto(); ?>
        <?php $totalProductPrice = ($product->precio - ($product->precio * ($product->oferta/100))) * $linea->unidades; ?>
        <tr>
            <td style="border: 2px solid black;"><?= $product->nombre ?></td>
            <td style="border: 2px solid black;"><?= $product->descripcion ?></td>
            <td style="border: 2px solid black;"><?= $linea->unidades ?></td>
            <td style="border: 2px solid black;"><?= $totalProductPrice ?> &euro;</td>
        </tr>
    <?php endforeach; ?>
    <?php 
        $fecha = $pedido->fecha->format(DATE_FORMAT);
        $hora = $pedido->hora->format(TIME_FORMAT);
        $pedido->calcCoste();
        */
    ?>
    <tr>
        <th style="text-align: right;" colspan="4">Precio Total: <?= '100.5' ?> &euro;</th>
    </tr>
</table>
<br/>
Este pedido se realizo el <?= '22/02/2022' ?> a las <?= '00:00:00' ?>.<br/>
El pedido se enviar&aacute; a: <?= '' ?><br/><br/>
Tenga un buen dia, <br/>Firmado: Chinos Paco.