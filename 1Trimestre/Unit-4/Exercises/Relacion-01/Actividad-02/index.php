<!DOCTYPE html>
<?php
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

    if (isset($_COOKIE['lang'])) {
        $lang = $_COOKIE['lang'];
    }

    if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['lang'])) {
        $newLang = $_GET['lang']; 
        $alloweds = ['es', 'en'];
        if (in_array($newLang, $alloweds)) {
            $cookieDate = date_modify(date_create(), "+1 years");
            setcookie('lang', $newLang, ['expires'=>$cookieDate->getTimestamp()]);
            $lang = $newLang;
        }
    }
    
    include("lang/$lang.php");

    function get($text): String {
        return LANG_TEXT[$text] ?? $text;
    }

    $cookieValue = 0;
    if (isset($_COOKIE['visits'])) {
        $cookieValue = $_COOKIE['visits'];
    }
    $cookieDate = date_modify(date_create(), "+1 years");
    $cookieValue++;

    setcookie('visits', $cookieValue, ['expires'=>$cookieDate->getTimestamp()]);
?>
<html lang="es">
    <head>
        <title>Cookies</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="GET">
            <fieldset>
                <label for="en">
                    <input id="en" type="radio" name="lang" value="en" <?= ($lang == 'en') ? 'checked' : ''; ?> />
                    <?= get('English') ?>
                </label>
                <label for="es">
                    <input id="es" type="radio" name="lang" value="es" <?= ($lang == 'es') ? 'checked' : ''; ?> />
                    <?= get('Spanish') ?>
                </label>
                <input type="submit" value="<?= get('Translate') ?>"/>
            </fieldset>
        </form>
        <p><?= get("Times that you visit this page") ?>: <?= $_COOKIE['visits'] ?? 0 ?></p>
    </body>
</html>