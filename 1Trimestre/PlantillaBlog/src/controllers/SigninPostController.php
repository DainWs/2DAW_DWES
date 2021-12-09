<?php
require_once("../src/config/constants.php");
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
    if (validateIsEmpty($name)) {
        $err['name'] = 'You have to specify a name for your account.';
    }

    if (validateIsEmpty($email)) {
        $err['email'] = 'You have to specify a email for your account.';
    } else if (!validateEmail($email)){
        $err['email'] = 'The specified email is not correct';
    } else {
        try {
            if (existUserWithEmail($email)) {
                $err['email'] = 'There is already a user with that email.';
            }
        }
        catch(Exception $ex) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    }

    if (validateIsEmpty($password)) {
        $err['password'] = 'You have to specify a password for your account.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $user = [
                USER_NAME => $name,
                USER_SURNAME => $surname,
                USER_EMAIL => $email,
                USER_PASSWORD => $password
            ];
            $result = saveUser($user);
        } 
        catch(Exception $ex) {
            $result = false;
        } 
        finally {
            if ($result) {
                $user = getUserByEmail($email);
                addSession($user);
                header("Location: ../index.php");
                exit;
            } else {
                $err['other'] = 'Review email and password.';
            }
        }
    }
    return (count($err) > 0) ? $err : true;
}