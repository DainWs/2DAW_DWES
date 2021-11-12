<?php
@Deprecated;
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$err = '';

if (!empty($username) && !empty($password)) {
    $userCredentials = validateUserCredentials($username, $password);
    if ($userCredentials != null) {
        $token = SessionManager::getInstance()->addSession($userCredentials);
        $expeditionDate = date_modify(date_create(), '+5 minute');
        setcookie('token', $token, $expeditionDate->getTimestamp(), '/', false, false);
        header("Location: ../index.php");
        exit;
    } else {
        $err = 'Review username and password';
    }
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
