<?php
require_once("../../src/config/constants.php");
require_once("../../src/domain/LangManager.php");
require_once("../../src/domain/SessionManager.php");
require_once("../../src/services/db/DBConnection.php");

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
 * Add a session for this browser with the user data
 * @param Array $userCredentials The user data as array
 * @return void
 */
function prepareSession(Array $userCredentials): void {
    addSession($userCredentials);
    header("Location: ../index.php");
    exit;
}

/**
 * Do all actions for a login post type
 * @return String error mensaje
 * @return true if was successfully complete
 */
function doLoginPost(): String|bool {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $err = '';
    if (empty($email) || empty($email)) {
        $err = 'You have to specify a email and password.';
    } else {
        $userCredentials = validateUserCredentials($email, $password);
        if ($userCredentials != null) {
            addSession($userCredentials);
        } else {
            $err = 'Review email and password';
        }
    }
    return (!empty($err))? $err : true;
}