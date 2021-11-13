<!DOCTYPE html>
<?php 
function hasSession(): bool {
    $token = $_COOKIE['PHPSESSID'];
    return isset($_SESSION[$token]);
}

function removeSession() {
    session_destroy();
    header("Location: index.php");
    exit;
}

$username = '';
if (hasSession()) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['logOut'])) {
            removeSession();
        }
    } else {
        $token = $_COOKIE['PHPSESSID'];
        $username = $_SESSION[$token]['username'];
    }
} else {
    header("Location: index.php");
    exit;
}
?>
<html lang="es">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <main>
            <header>
                <h1>Welcome <?= $username ?></h1>
            </header>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                <input type="submit" name="logOut" value="Log out"/>
            </form> 
        </main>
    </body>
</html>