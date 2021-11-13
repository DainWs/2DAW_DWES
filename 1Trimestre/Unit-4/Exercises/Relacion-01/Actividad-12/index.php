<!DOCTYPE html>
<?php
session_start();
function hasCredentialsInCookies(): bool {
    return $_COOKIE['rememberMe'] ?? false;
}

function getCredentialsFromCookies(): Array {
    $usernameCookie = $_COOKIE['username'] ?? '';
    $passwordCookie = $_COOKIE['password'] ?? '';

    $credentials = [];
    if (!(empty($usernameCookie) || empty($passwordCookie))) {
        $credentials = [
            'username' => $usernameCookie,
            'password' => base64_decode($passwordCookie)
        ];
    }
    return $credentials;
}

// Checking credentials with encrypted passwords
function validateUserCredentials($username, $password): bool {
    $users = [
        'admin' => base64_encode('admin'),
        'usuario' => base64_encode('usuario')
    ];

    $result = isset($users[$username]);
    if ($result) {
        $userPassHash = $users[$username];
        $result = ($password == $userPassHash);
    }
    return $result;
}

function addCredentialsToCookies($username, $password, $rememberMe): void {
    setcookie('username', $username);
    setcookie('password', base64_encode($password));
    setcookie('rememberMe', $rememberMe);
}

function removeCredentialsFromCookies(): void {
    setcookie('username', '', time() - 60);
    setcookie('password', '', time() - 60);
    setcookie('rememberMe', '', time() - 60);
}

function hasSession(): bool {
    $token = $_COOKIE['PHPSESSID'];
    return isset($_SESSION[$token]);
}

function addSession($username): void {
    $token = $_COOKIE['PHPSESSID'];
    if (!(isset($_SESSION[$token]))) {
        $_SESSION[$token] = [
            'username' => $username
        ];
    }
}

if (hasSession()) {
    header("Location: home.php");
    exit;
}

$username = '';
$password = '';
$rememberMe = false;

$err = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = (isset($_POST['username'])) ? $_POST['username'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';
    
    $rememberMe = (isset($_POST['rememberMe'])) ? $_POST['rememberMe'] : false;

    if (empty($username) || empty($password)) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $err = 'Fill all required fields (username and password).';
        }
    } else {
        $areValids = validateUserCredentials($username, base64_encode($password));
        if ($areValids) {
            if ($rememberMe) {
                addCredentialsToCookies($username, $password, true);
            } else {
                removeCredentialsFromCookies();
            }
            addSession($username);
            header("Location: home.php");
            exit;
        } else {
            $err = 'Review username and password';
        }
    }
} elseif (hasCredentialsInCookies()) {
    $cookiesCredentials = getCredentialsFromCookies();
    if (count($cookiesCredentials) > 0) {
        $username = $cookiesCredentials['username'];   
        $password = $cookiesCredentials['password'];
        $rememberMe = $_COOKIE['rememberMe'];
    } else {
        removeCredentialsFromCookies();
    }
}
?>
<html lang="es">
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            .error {color: red;}
        </style>
    </head>
    <body>
        <main>
            <?php if (!empty($err)) : ?>
                <p class="error"><?php echo $err ?></p>
            <?php endif; ?>
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="POST" enctype="application/x-www-form-urlencoded">
                <label for="username">Username:</label><br/>
                <input type="text" id="username" name="username" value="<?= $username ?? '' ?>" required/><br/>
                
                <label for="password">Password:</label><br/>
                <input type="password" id="password" name="password" value="<?= $password ?? '' ?>" required/><br/>
                <br/>
                <input type="checkbox" id="rememberMe" name="remember" <?= ($rememberMe) ? 'checked' : '' ?>/>
                <label for="rememberMe">Remember me</label>

                <input type="submit" value="Sign in">
            </form> 
        </main>
    </body>
</html>