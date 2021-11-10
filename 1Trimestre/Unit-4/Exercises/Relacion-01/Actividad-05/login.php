<!DOCTYPE html>
<?php
function addSession($data): String {
    session_start();
    $token = bin2hex(random_bytes(16));
    if (!(isset($_SESSION[$token]))) {
        $_SESSION[$token] = $data;
    }
    return $token;
}

function validateUserCredentials($username, $password) {
    $users = [
        'admin' => 'admin',
        'usuario' => 'usuario'
    ];
    $userPass = $users[$username];
    $result = null;
    if ($userPass == $password) {
        $result = ['username' => $username, 'password' => $password];
    }
    return $result;
}

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$err = '';
if (!empty($username) || !empty($password)) {
    $userCredentials = validateUserCredentials($username, $password);
    if ($userCredentials != null) {
        addSession($userCredentials);
        header("Location: index.php");
    } else {
        $err = traduce('Review username and password');
    }
}
?>
<html lang="es">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <?php if (!empty($err)) : ?>
                <p class="error"><?php echo $err ?></p>
            <?php endif; ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="username">Username:</label><br/>
                <input type="text" id="username" name="username" value="<?php echo $_POST['username'] ?? ''; ?>" required/><br/>
                
                <label for="password">Password:</label><br/>
                <input type="password" id="password" name="password" value="<?php echo $_POST['password'] ?? ''; ?>" required/><br/>
                <br/>
                <input type="submit" value="Sign in">
            </form> 
        </main>
    </body>
</html>