<?php

namespace exam\src\controllers;

use Exception;
use exam\src\domain\SessionManager;
use exam\src\domain\validators\FormValidator;
use exam\src\models\Usuarios;
use exam\src\services\db\DBTableUsuarios;

/**
 * This is the controller for the usuarios post requests
 */
class UsuariosController extends PostController {

    /**
     * Do all actions for a add user post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doAddUserPost(): bool {
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $errors = [];
        if (FormValidator::validateIsEmpty($name)) {
            $errors['name'] = 'You have to specify a name for your account.';
        }
    
        if (FormValidator::validateIsEmpty($email)) {
            $errors['email'] = 'You have to specify a email for your account.';
        } else if (!FormValidator::validateEmail($email)){
            $errors['email'] = 'The specified email is not correct';
        } else {
            try {
                $table = new DBTableUsuarios();
                $user = $table->queryWhereEmail($email);
                if ($user && count($user) > 0) {
                    $errors['email'] = 'There is already a user with that email.';
                }
            }
            catch(Exception $ex) {
                $errors['others']= 'An unknown error was success, please try it again more later.';
            }
        }
    
        if (FormValidator::validateIsEmpty($password)) {
            $errors['password'] = 'You have to specify a password for your account.';
        }
    
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $user = new Usuarios();
                $user->id = 0;
                $user->nombre = $name;
                $user->apellidos = $surname;
                $user->email = $email;
                $user->password = $password;

                $table = new DBTableUsuarios();
                $result = $table->insert($user);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result) {
                    (new NavigationController())->moveTo('home.php');
                    exit();
                } else {
                    $errors['other'] = 'Review email and password.';
                }
            }
        }
        $this->errors[CONTROLLER_USUARIOS] = $errors;
        return (count($errors) <= 0);
    }

    /**
     * Do all actions for a edit user post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doEditUserPost(): bool {
        $currentUser = SessionManager::getInstance()->getSession();

        $id = $_POST['id'] ?? $currentUser->id;
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $newpassword = $_POST['new-password'] ?? '';
    
        $errors = [];

        if (FormValidator::validateIsNotEmpty($email)) {
            if (FormValidator::validateEmail($email)) {
                // DB Access exception control
                try {
                    $table = new DBTableUsuarios();
                    $user = $table->queryWhereEmail($email);
                    if ($user && count($user) > 0) {
                        $errors['email'] = 'There is already a user with that email.';
                    }
                } 
                catch(Exception $ex) {
                    $errors['others']= 'An unknown error was success, please try it again more later.';
                }   
            } else {
                $errors['email'] = 'The specified email is not correct';
            }
        }

        if (FormValidator::validateIsNotEmpty($newpassword) && FormValidator::validateIsEmpty($password)) {
            $errors['new-password'] = 'You have to specify the user password to change this one to a new password.';
        }
    
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $user = new Usuarios();
                $user->id = $id;
                $user->nombre = $name;
                $user->apellidos = $surname;
                $user->email = $email;
                $user->password = $password;

                $table = new DBTableUsuarios();
                $result = $table->update($user);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result) {
                    if ($id == $currentUser->id) {
                        $table = new DBTableUsuarios();
                        $currentUser = $table->queryWith($id)[0];
                        SessionManager::getInstance()->updateSession($currentUser);
                        (new NavigationController())->moveTo('home.php');
                        exit();
                    }
                } else {
                    $errors['other'] = 'An unknown error was success, please try it again more later.';
                }
            }
        }
        $this->errors[CONTROLLER_USUARIOS] = $errors;
        return (count($errors) <= 0);
    }
}