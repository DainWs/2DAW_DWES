<html>
    <body>
        Hi Mr/s <?= '' ?>,<br />
        Enviamos este correo para informarle que ha comprado los siguientes productos:<br />
        <table style="border: 2px solid black; border-collapse: collapse;">
            <tr>
                <th style="border: 2px solid black;">Fila</th>
                <th style="border: 2px solid black;">Columna</th>
            </tr>
            <?php foreach($DATA['butacas'] as $butaca): ?>
                <tr>
                    <td style="border: 2px solid black;"><?= $butaca->fila ?></td>
                    <td style="border: 2px solid black;"><?= $butaca->columna ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br/>
        Este pedido se realizo el <?= '22/02/2022' ?> a las <?= '00:00:00' ?>.<br/>
        El pedido se enviar&aacute; a: <?= '' ?><br/><br/>
        Tenga un buen dia, <br/>Firmado: Chinos Paco.
    </body>
</html>