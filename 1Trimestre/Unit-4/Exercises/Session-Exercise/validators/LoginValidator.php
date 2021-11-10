<?php
include("controller/LangManager.php");
include("controller/SessionManager.php");

$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$err = '';
if (!empty($username) || !empty($password)) {
    $userCredentials = validateUserCredentials($username, $password);
    if ($userCredentials != null) {
        SessionManager::getInstance()->addSession($userCredentials);
        header("Location: ../index.php");
    } else {
        $err = traduce('Review username and password');
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
