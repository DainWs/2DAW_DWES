<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBUserConnection.php");

/**
 * Do all actions for a login post type
 * @return String error mensaje
 * @return true if was successfully complete
 */
function doSigninPost(): String|bool {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $err = '';
    if (empty($name) || empty($email) || empty($password)) {
        $err = 'You have to specify a email and password.';
    } else {
        $user = [
            USER_NAME => $name,
            USER_SURNAME => $surname,
            USER_EMAIL => $email,
            USER_PASSWORD => $password
        ];
        
        $wasSaved = saveUser($user);
        if ($wasSaved) {
            addSession($user);
            header("Location: ../index.php");
            exit;
        } else {
            $err = 'Review email and password';
        }
    }
    return (!empty($err))? $err : true;
}