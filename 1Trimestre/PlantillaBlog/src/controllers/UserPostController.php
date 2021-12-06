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
    if (empty($id)) {
        $err[USER_ID] = 'You have to specify a user id.';
    }

    if (!empty($email)) {
        if (existUserWithEmail($_POST['email'])) {
            $err[USER_EMAIL] = 'A user is already using this email.';
        }
    }

    if (!empty($newpassword)) {
        if (empty($password)) {
            $err[USER_PASSWORD] = 'You have to specify the user password to change this one to a new password.';
        }
        else {
            $dbUser = getUserByEmail($email);
            if ($dbUser[USER_PASSWORD] != md5($password)) {
                $err[USER_PASSWORD] = 'The specified password is not valid';
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
    $email = $_POST['email'] ?? $tempUserSession[USER_EMAIL] ?? '';
    $password = $_POST['password'] ?? '';

    $err = [];
    if (empty($id) || empty($email)) {
        $err['other'] = 'Your session may have expired, refresh the page.';
    }

    if (empty($password)) {
        $err[USER_PASSWORD] = 'You have to specify the user password to delete this account.';
    }
    else {
        $dbUser = getUserByEmail($email);
        if ($dbUser[USER_PASSWORD] != md5($password)) {
            $err[USER_PASSWORD] = 'The specified password is not valid';
        }
    }

    $result = true;
    if (count($err) == 0) {
        $result = deleteUser($id);
    }
    return (count($err) > 0) ? $err : $result;
}