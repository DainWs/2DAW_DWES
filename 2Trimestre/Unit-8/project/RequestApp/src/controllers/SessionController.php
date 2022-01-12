<?php

namespace src\controllers;

use Exception;
use src\domain\SessionManager;
use src\domain\validators\FormValidator;
use src\models\Usuarios;
use src\services\db\DBTableUsuarios;

class SessionController extends PostController {

    /**
     * Do all actions for a login post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doLoginPost(): bool {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $this->errors = [];
        if (FormValidator::validateIsEmpty($email)) {
            $this->errors['email'] = 'You have to specify a email for your account.';
        } else if (!FormValidator::validateEmail($email)){
            $this->errors['email'] = 'The specified email is not correct';
        }
        
        if (FormValidator::validateIsEmpty($password)) {
            $this->errors['password'] = 'You have to specify a password.';
        } 
    
        if (count($this->errors) == 0){
            $result = null;
            // DB Access exception control
            try {
                $result = $this->validateUserCredentials($email, $password);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result instanceof Usuarios) {
                    SessionManager::getInstance()->addSession($result);
                    //TODO es posible un cambio
                    header("Location: ../index.php");
                    exit;
                } else {
                    $this->errors['others']= 'Review email and password.';
                }
            }
        }
        return (count($this->errors) <= 0);
    }

    /**
     * Do all actions for a login post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doSigninPost(): bool {
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $this->errors = [];
        if (FormValidator::validateIsEmpty($name)) {
            $this->errors['name'] = 'You have to specify a name for your account.';
        }
    
        if (FormValidator::validateIsEmpty($email)) {
            $this->errors['email'] = 'You have to specify a email for your account.';
        } else if (!FormValidator::validateEmail($email)){
            $this->errors['email'] = 'The specified email is not correct';
        } else {
            try {
                $table = new DBTableUsuarios();
                $user = $table->queryWhere('email', $email);
                if ($user && count($user) > 0) {
                    $this->errors['email'] = 'There is already a user with that email.';
                }
            }
            catch(Exception $ex) {
                $this->errors['others']= 'An unknown error was success, please try it again more later.';
            }
        }
    
        if (FormValidator::validateIsEmpty($password)) {
            $this->errors['password'] = 'You have to specify a password for your account.';
        }
    
        $result = true;
        if (count($this->errors) == 0) {
            // DB Access exception control
            try {
                $user = new Usuarios();
                $user->id = 0;
                $user->nombre = $name;
                $user->apellidos = $surname;
                $user->email = $email;
                $user->password = $password;
                $user->rol = 'Cliente';

                $table = new DBTableUsuarios();
                $result = $table->insert($user);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result) {
                    $table = new DBTableUsuarios();
                    $dbUsers = $table->queryWhere('email', $email);
                    if (is_array($dbUsers)) {
                        $user = $dbUsers[array_keys($dbUsers)[0]];
                        SessionManager::getInstance()->addSession($user);
                        //TODO es posible un cambio
                        header("Location: ../index.php");
                        exit;
                    }
                } else {
                    $this->errors['other'] = 'Review email and password.';
                }
            }
        }
        return (count($this->errors) <= 0);
    }

    public function doClosePost(): void {
        SessionManager::getInstance()->clearSession();
    }

    /**
     * Validate the user credentials from the db
     * @param String $email the user email
     * @param String $password the user password
     * @return Usuarios with the user data
     * @return false if was not valid/correct data
     */
    private function validateUserCredentials(String $email, String $password): Usuarios|bool {
        $table = new DBTableUsuarios();
        $dbUsers = $table->queryWhere('email', $email);
        echo $email;
        $result = false;
        if (is_array($dbUsers)) {
            var_dump($dbUsers);
            $dbUser = $dbUsers[array_keys($dbUsers)[0]];
            if ($dbUser->password == md5($password)) {
                $result = $dbUser;
            }
        }
        return $result;
   }
}