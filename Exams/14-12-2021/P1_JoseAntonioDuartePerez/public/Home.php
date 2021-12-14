<!DOCTYPE html>
<?php

use src\controllers\PostController;
use src\services\DBRuteConnection;

require_once('../src/config/constants.php');
require_once('../src/models/Ruta.php');
require_once('../src/controllers/PostController.php');
require_once('../src/controllers/RutePostController.php');
require_once('../src/services/DBRuteConnection.php');
require_once('../src/validators/FormValidator.php');

new PostController();

$RUTES = (new DBRuteConnection())->query($_GET['name'] ?? "", $_GET['filterBy'] ?? RUTE_ID);
?>
<html lang="es">
    <head>
        <title>Senderismo</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <section>
            <div>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="GET">
                    <label for="search-filter">Buscar por el campo</label>
                    <select id="search-filter" name="filterBy">
                        <option value="<?= RUTE_TITLE ?>"><?= RUTE_TITLE ?></option>
                        <option value="<?= RUTE_DESCRIPTION ?>"><?= RUTE_DESCRIPTION ?></option>
                        <option value="<?= RUTE_DESNIVEL ?>"><?= RUTE_DESNIVEL ?></option>
                        <option value="<?= RUTE_DISTANCIA ?>"><?= RUTE_DISTANCIA ?></option>
                        <option value="<?= RUTE_DIFICULTAD ?>"><?= RUTE_DIFICULTAD ?></option>
                    </select>
                    
                    <input id="search-field" type="text" name="name" value="<?= $_GET['name'] ?? "" ?>" />
                    <input id="search-btn" type="submit" value="¡Buscar!" />
                </form>
            </div>
            <div>
                <form action="newRute.php" method="GET">
                    <input type="submit" value="Nueva ruta" />
                </form>
                <form action="<?= $_SERVER['PHP_SELF']; ?>" method="GET">
                    <input type="submit" value="Listado completo" />
                </form>
            </div>
        </section>
        <section>
            <table>
                <tr>
                    <th>T&iacute;tulo</th>
                    <th>Descripci&oacute;n</th>
                    <th>Desnivel (m)</th>
                    <th>Distancia (km)</th>
                    <th>Dificultad</th>
                    <th>operaciones</th>
                </tr>
                <?php foreach($RUTES as $rute):?>
                    <tr>
                        <td><?= $rute->getTitulo(); ?></td>
                        <td><?= $rute->getDescripcion(); ?></td>
                        <td><?= $rute->getDesnivel(); ?></td>
                        <td><?= $rute->getDistancia(); ?></td>
                        <td><?= $rute->getNotas(); ?></td>
                        <td><?= $rute->getDificultad(); ?></td>
                        <td>
                            <form action="comment.php" method="POST">
                                <input type="submit" value="Comentar" />
                                <input type="hidden" name="id_rute" value="<?= $rute->getId(); ?>" />
                            </form>
                            <form action="editRute.php" method="POST">
                                <input type="submit" value="Editar" />
                                <input type="hidden" name="id_rute" value="<?= $rute->getId(); ?>" />
                            </form>
                            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="submit" value="Borrar" />
                                <input type="hidden" name="id" value="<?= $rute->getId(); ?>" />
                                <input type="hidden" name="submitType" value="<?= SUBMIT_TYPE_DELETE_RUTE ?>" />
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </body>
</html>
