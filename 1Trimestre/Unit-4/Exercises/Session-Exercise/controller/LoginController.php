<?php
include("../domain/LangManager.php");
include("../domain/SessionManager.php");

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$err = '';
if (empty($username) || empty($password)) {
    $err = 'You have to specify a username and password.';
} else {
    $userCredentials = validateUserCredentials($username, $password);
    if ($userCredentials != null) {
        prepareSession($userCredentials);
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


function prepareSession($userCredentials) {
    SessionManager::getInstance()->addSession($userCredentials);
    header("Location: ../index.php");
    exit;
}

// PAGE DATA DECLARATION
const DATA = [
    'pageTitle' => "Login",
    'cssFile' => "../css/index.css"
];