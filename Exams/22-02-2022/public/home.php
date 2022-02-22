<?php

use exam\src\domain\CookiesManager;
use exam\src\domain\ViewConstants; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $DATA['title'] ?? '20/02/2022 Exam' ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/main.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/nav.css" rel="stylesheet" type="text/css" />
        <link href="<?= $_SERVER['APP_BASE_URL'] ?>/assets/css/widget.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php include('templates/header.php'); ?>
        <section>
            <article>
                <h1 style="text-align: center;border-bottom: 1px solid black;">Escenario</h1>
                <table style="margin: auto">
                    <?php $butacas = $DATA[ViewConstants::LIST_MODEL_BUTACAS]; ?>
                    <?php for ($i=1; $i <= count($butacas); $i++): ?>
                        <tr>
                            <th><?= $i ?></th>
                            <?php for ($j=1; $j <= count($butacas[$i]); $j++): ?>
                                <td style="width: 15px; height: 5px;">
                                    <form style="margin: 0;" action="<?= $_SERVER['APP_BASE_URL'] . '/ReservasController/doAddReservaPost' ?>" method="POST">
                                        <input type="hidden" name="id" value="<?= $butacas[$i][$j]->id ?>">
                                        <input style="margin: 0;<?= ($butacas[$i][$j]->ocupada) ? (($butacas[$i][$j]->isMine ?? false) ? 'background-Color: green;' : 'background-Color: red;') : ' ' ?>" type="submit" value=" ">
                                    </form>
                                </td>
                            <?php endfor; ?>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <th>0</th>
                        <?php for ($i=1; $i <= count($butacas[1]); $i++): ?>
                            <th><?= $i ?></th>
                        <?php endfor; ?>
                    </tr>
                </table>
                <p>Nota: se puede reservar un maximo de 5 localidades por persona.</p>
                <ul>
                    <li>[Blanco] Sin reservar. </li>
                    <li>[Rojo] Reservado. </li>
                    <li>[Verde] Reservado por ti. </li>
                </ul>
            </article>
            <aside>
                <?php if ($DATA[ViewConstants::HAS_SESSION]): ?>
                <?php else: ?>
                    <?php include('templates/widgets/forms/loginWidget.php'); ?>
                <?php endif ?>
            </aside>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
    <?php if(isset($DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['others'])): ?>
        <script>
            window.onload = () => {
                alert("<?= $DATA[ViewConstants::FORM_ERRORS][CONTROLLER_USUARIOS]['others'] ?? ''; ?>");
            }
        </script>
    <?php elseif ($DATA[ViewConstants::SHOW_DIALOG]):?>
        <script>
            window.onload = () => {
                alert("Gracias por reservar en esta pagina.");
            }
        </script>
    <?php endif; ?>
</html>