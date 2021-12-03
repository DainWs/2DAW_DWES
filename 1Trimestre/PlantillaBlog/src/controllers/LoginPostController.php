<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBUserConnection.php");

/**
 * Validate the user credentials from the db
 * @param String $email the user email
 * @param String $password the user password
 * @return Array with the user data
 * @return null if was not valid/correct data
 */
function validateUserCredentials(String $email, String $password): Array|null {
    $dbUser = getUserByEmail($email);
    $result = null;
    if ($dbUser[USER_PASSWORD] == md5($password)) {
        $result = $dbUser;
    }
    return $result;
}

/**
 * Do all actions for a login post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doLoginPost(): Array|bool {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $err = [];
    if (empty($email)) {
        $err[USER_EMAIL] = 'You have to specify a email.';
    }
    
    if (empty($password)) {
        $err[USER_PASSWORD] = 'You have to specify a password.';
    } 

    if (count($err) == 0){
        $userCredentials = validateUserCredentials($email, $password);
        if ($userCredentials != null) {
            addSession($userCredentials);
            header("Location: ../index.php");
            exit;
        } else {
            $err = 'Review email and password';
        }
    }
    return (!empty($err))? $err : true;
}