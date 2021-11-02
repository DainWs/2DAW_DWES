<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Radio buttons</title>
    </head>
    <body>
        <main>
            <section>
                <header>Formularios</header>
                <form method="post" action="./RadioButtons.php">
                    <fieldset>
                        <legend>Radio group</legend>
                        <div>
                            <input id="futbol" type="radio" name="deportes" value="futbol"/>
                            <label for="futbol">futbol</label>
                        </div>
                        <div>
                            <input id="baloncesto" type="radio" name="deportes" value="baloncesto"/>
                            <label for="baloncesto">baloncesto</label>
                        </div>
                        <div>
                            <input id="beisball" type="radio" name="deportes" value="beisball"/>
                            <label for="beisball">beisball</label>
                        </div>
                    </fieldset>
                    <input type="submit" value="save"/>
                </form>
            </section>
            <section>
                <p> El deporte seleccionado es : <?php echo $_POST['deportes'] ?? ''; ?></p>
            </section>
        </main>
    </body>
</html>