<!DOCTYPE html>
<?php

use src\controllers\PostController;
use src\services\DBComentarioConnection;
use src\services\DBRuteConnection;

require_once('../src/config/constants.php');
require_once('../src/models/Ruta.php');
require_once('../src/models/Comentario.php');
require_once('../src/controllers/PostController.php');
require_once('../src/controllers/RutePostController.php');
require_once('../src/services/DBRuteConnection.php');
require_once('../src/services/DBComentarioConnection.php');
require_once('../src/validators/FormValidator.php');

new PostController();

if (PostController::$DATA['ruteUpdate'] ?? false) {
    header("location: home.php");
}

if (!isset($_POST['id_rute'])) {
    header("location: home.php");
}

$RUTE = (new DBRuteConnection())->queryWith($_POST['id_rute']);

?>
<html lang="es">

<head>
    <title>Senderismo</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <section>
        <?php foreach ($RUTE as $rute) : ?>
            <ul>
                <li>Titulo: <?= $rute->getTitulo(); ?></li>
                <li>Description: <?= $rute->getDescripcion(); ?></li>
                <li>Desnivel: <?= $rute->getDesnivel(); ?></li>
                <li>Distancia: <?= $rute->getDistancia(); ?></li>
                <li>Notas: <?= $rute->getNotas(); ?></li>
                <li>Dificultas: <?= $rute->getDificultad(); ?></li>
            </ul>
            <?php $COMENTARIOS = (new DBComentarioConnection())->queryWith($_POST['id_rute']); ?>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Texto</th>
                </tr>
                <tr>
                    
                </tr>
                <?php foreach($COMENTARIOS as $comment):?>
                    <tr>
                        <td><?= $comment->getNombre(); ?></td>
                        <td><?= $comment->getFecha(); ?></td>
                        <td><?= $comment->getTexto(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
    </section>
</body>

</html>