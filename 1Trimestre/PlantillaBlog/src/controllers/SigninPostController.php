<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBUserConnection.php");

/**
 * Do all actions for a login post type
 * @return Array error mensaje
 * @return true if was successfully complete
 */
function doSigninPost(): Array|bool {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $err = [];
    if (empty($name)) {
        $err['name'] = 'You have to specify a name for your account.';
    }

    if (empty($email)) {
        $err['email'] = 'You have to specify a email for your account.';
    }

    if (empty($password)) {
        $err['password'] = 'You have to specify a password for your account.';
    }

    if (count($err) == 0) {
        $user = [
            USER_NAME => $name,
            USER_SURNAME => $surname,
            USER_EMAIL => $email,
            USER_PASSWORD => $password
        ];
        
        $wasSaved = saveUser($user);
        if ($wasSaved) {
            $user = getUserByEmail($email);
            addSession($user);
            header("Location: ../index.php");
            exit;
        } else {
            $err['other'] = 'Review email and password';
        }
    }
    return (count($err) > 0) ? $err : true;
}