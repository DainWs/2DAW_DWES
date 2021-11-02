<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body> 
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="day">d&iacute;a de nacimiento:</label>
            <input id="day" type="number" name="day" pattern="(?:[0-3])?[0-9]" value="<?= $_REQUEST['day'] ?? 1; ?>"/>
            <br/>
            <label for="month">Mes de nacimiento:</label>
            <input id="month" type="number" name="month" pattern="(?:[0-1])?[0-9]" value="<?= $_REQUEST['month'] ?? 1; ?>"/>
            <br/>
            <label for="year">A&ntilde;o de nacimiento:</label>
            <input id="year" type="number" name="year" pattern="[0-9]{4}" value="<?= $_REQUEST['year'] ?? 2000; ?>"/>
            <br/>
            <input type="submit" value="Submit"/>
        </form>

        <?php
            $currentYear = intval(date("Y"));
            $edad = $currentYear - ($_REQUEST['year'] ?? 2000);
        ?>

        <p>Datos introducidos: <?= $_REQUEST['day'] ?? 1 ?>/<?= $_REQUEST['month']?? 1 ?>/<?= $_REQUEST['year']?? 2000 ?></p>

        <p><b>A&ntilde;os/Edad:</b> <?= $edad ?></p>

        <?php if ($edad >= 18): ?>
            <?php if ($edad > 85): ?>
                <p>Es demasiado mayor para entrar en este local.</p>
            <?php else: ?>
                <p>puede pasar dentro.</p>
            <?php endif; ?>        
        <?php else: ?>
            <p>Vete a dormir.</p>
        <?php endif; ?>
    </body>
</html>