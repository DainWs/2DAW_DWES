<?php
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
                
            </article>
            <aside>
                <?php if ($DATA[ViewConstants::HAS_SESSION]): ?>
                <?php else: ?>
                    <?php include('templates/widgets/forms/signinWidget.php'); ?>
                    <?php include('templates/widgets/forms/loginWidget.php'); ?>
                <?php endif ?>
            </aside>
        </section>
        <?php include('templates/footer.php'); ?>
    </body>
</html>