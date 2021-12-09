<?php
require_once("../src/config/constants.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBEntryConnection.php");


/**
 * Do all actions for a user edit post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doUserEditPost(): Array|bool {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $newpassword = $_POST['new-password'] ?? '';

    $err = [];
    if (validateIsNotEmpty($email)) {
        if (validateEmail($email)) {
            // DB Access exception control
            try {
                if (existUserWithEmail($email)) {
                    $err['email'] = 'There is already a user with that email.';
                }
            } 
            catch(Exception $ex) {
                $err['others']= 'An unknown error was success, please try it again more later.';
            }   
        } else {
            $err['email'] = 'The specified email is not correct';
        }
    }

    if (validateIsNotEmpty($newpassword) && validateIsEmpty($password)) {
        $err['new-password'] = 'You have to specify the user password to change this one to a new password.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $currentUser = getSession();
            $dbUser = getUserByEmail($currentUser[USER_EMAIL]);
            if ($dbUser[USER_PASSWORD] == md5($password)) {
                $user = [
                    USER_ID => $dbUser[USER_ID],
                    USER_NAME => $name,
                    USER_SURNAME => $surname,
                    USER_EMAIL => $email,
                    USER_PASSWORD => $newpassword
                ];
                $result = updateUser($user);
            } else {
                $err['password'] = 'The specified password is not valid';
            }
        } 
        catch(Exception $ex) {
            $result = false;
        } 
        finally {
            if (!$result) {
                $err['others']= 'An unknown error was success, please try it again more later.';
            }
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
    $currentUser = getSession();
    $password = $_POST['password'] ?? '';

    $err = [];
    if (validateIsEmpty($password)) {
        $err['password'] = 'You have to specify the user password to delete this account.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $dbUser = getUserByEmail($currentUser[USER_EMAIL]);
            if ($dbUser[USER_PASSWORD] == md5($password)) {
                $result = deleteUser($dbUser[USER_ID]);
            } else {
                $err['password'] = 'The specified password is not valid';
            }
        } 
        catch(Exception $ex) {
            $result = false;
        } 
        finally {
            if (!$result) {
                $err['others']= 'An unknown error was success, please try it again more later.';
            }
        }
    }
    return (count($err) > 0) ? $err : $result;
}