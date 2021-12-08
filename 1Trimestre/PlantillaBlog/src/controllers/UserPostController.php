<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBEntryConnection.php");


/**
 * Do all actions for a user edit post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doUserEditPost(): Array|bool {
    $tempUserSession = getSession();
    $id = $tempUserSession[USER_ID] ?? '';
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $newpassword = $_POST['new-password'] ?? '';

    $err = [];
    if (validateIsEmpty($id)) {
        $err['others'] = 'You have to specify a user id.';
    }

    if (validateIsNotEmpty($email)) {
        if (validateEmail($email)) {
            if (existUserWithEmail($_POST['email'])) {
                $err['email'] = 'A user is already using this email.';
            }
        } else {
            $err['email'] = 'The specified email is nor correct';
        }
    }

    if (validateIsNotEmpty($newpassword)) {
        if (validateIsEmpty($password)) {
            $err['new-password'] = 'You have to specify the user password to change this one to a new password.';
        }
        else {
            $dbUser = getUserByEmail($email);
            if ($dbUser[USER_PASSWORD] != md5($password)) {
                $err['password'] = 'The specified password is not valid';
            }
        }
    }

    $result = true;
    if (count($err) == 0) {
        $user = [
            USER_ID => $id,
            USER_NAME => $name,
            USER_SURNAME => $surname,
            USER_EMAIL => $email,
            USER_PASSWORD => $newpassword
        ];
        $result = updateUser($user);
        if (!$result) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    }
    return (count($err) > 0) ? $err : $result;
}

/**
 * Do all actions for a user delete post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doUserDeletePost(): Array|bool {
    $tempUserSession = getSession();
    $id = $_POST['id'] ?? $tempUserSession[USER_ID] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $err = [];
    if (validateIsEmpty($id)) {
        $err['other'] = 'Your session may have expired, refresh the page.';
    }

    if (validateIsEmpty($password)) {
        $err['password'] = 'You have to specify the user password to delete this account.';
    }
    else {
        if (!validateEmail($email)) {
            $email = $tempUserSession['email'] ?? '';
        }
        try {
            $dbUser = getUserByEmail($email);
            if ($dbUser['password'] != md5($password)) {
                $err['password'] = 'The specified password is not valid';
            }
        }
        catch(Exception $ex) {
            $err['password'] = 'An unknown error was success, please try it again more later.';
        }
    }

    $result = true;
    if (count($err) == 0) {
        $result = deleteUser($id);
        if (!$result) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    }
    return (count($err) > 0) ? $err : $result;
}