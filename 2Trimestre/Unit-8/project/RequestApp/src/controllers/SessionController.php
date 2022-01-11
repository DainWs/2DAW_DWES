<?php

namespace src\controllers;

class SessionController {

    /**
     * Do all actions for a login post type
     * @return Array error mensaje
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doLoginPost(): Array|bool {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $err = [];
        if (validateIsEmpty($email)) {
            $err['email'] = 'You have to specify a email for your account.';
        } else if (!validateEmail($email)){
            $err['email'] = 'The specified email is not correct';
        }
        
        if (validateIsEmpty($password)) {
            $err['password'] = 'You have to specify a password.';
        } 
    
        $result = [];
        if (count($err) == 0){
            // DB Access exception control
            try {
                $result = validateUserCredentials($email, $password);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if (is_array($result)) {
                    addSession($result);
                    header("Location: ../index.php");
                    exit;
                } else {
                    $err['others']= 'Review email and password.';
                }
            }
        }
        return (!empty($err))? $err : true;
    }

    /**
     * Validate the user credentials from the db
     * @param String $email the user email
     * @param String $password the user password
     * @return Array with the user data
     * @return false if was not valid/correct data
     */
    private function validateUserCredentials(String $email, String $password): Array|bool {
       $dbUser = getUserByEmail($email);
       $result = false;
       if ($dbUser[USER_PASSWORD] == md5($password)) {
           $result = $dbUser;
       }
       return $result;
   }
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
    if (validateIsEmpty($email)) {
        $err['email'] = 'You have to specify a email for your account.';
    } else if (!validateEmail($email)){
        $err['email'] = 'The specified email is not correct';
    }
    
    if (validateIsEmpty($password)) {
        $err['password'] = 'You have to specify a password.';
    } 

    $result = [];
    if (count($err) == 0){
        // DB Access exception control
        try {
            $result = validateUserCredentials($email, $password);
        } 
        catch(Exception $ex) {
            $result = false;
        } 
        finally {
            if (is_array($result)) {
                addSession($result);
                header("Location: ../index.php");
                exit;
            } else {
                $err['others']= 'Review email and password.';
            }
        }
    }
    return (!empty($err))? $err : true;
}