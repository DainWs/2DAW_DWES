<?php

namespace exam\src\controllers;

use Exception;
use exam\src\domain\SessionManager;
use exam\src\domain\validators\FormValidator;
use exam\src\models\Usuarios;
use exam\src\services\db\DBTableUsuarios;

/**
 * This is the controller for the session post requests
 */
class SessionController extends PostController {
    /**
     * Do all actions for a login post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doLoginPost(): bool {
        $nombre = $_POST['nombre'] ?? '';
        $password = $_POST['password'] ?? '';
    
        $errors = [];
        if (FormValidator::validateIsEmpty($nombre)) {
            $errors['nombre'] = 'You have to specify a username for your account.';
        }
        
        if (FormValidator::validateIsEmpty($password)) {
            $errors['password'] = 'You have to specify a password.';
        } 
    
        if (count($errors) <= 0){
            $result = null;
            // DB Access exception control
            try {
                $result = $this->validateUserCredentials($nombre, $password);
            } 
            catch(Exception $ex) {
                $result = false;
            } 
            finally {
                if ($result instanceof Usuarios) {
                    SessionManager::getInstance()->addSession($result);
                    NavigationController::home();
                } else {
                    $errors['others']= 'Review email and password.';
                }
            }
        }
        $this->errors[CONTROLLER_SESSION_LOGIN] = $errors;
        return (count($errors) <= 0);
    }

    /**
     * Do all actions for a logout post type
     */
    public function doLogoutPost(): void {
        SessionManager::getInstance()->clearSession();
    }

    /**
     * Validate the user credentials from the db
     * @param String $nombre the user nombre
     * @param String $password the user password
     * @return Usuarios with the user data
     * @return false if was not valid/correct data
     */
    private function validateUserCredentials(String $nombre, String $password): Usuarios|bool {
        $table = new DBTableUsuarios();
        $dbUsers = $table->queryWhereUsername($nombre);
        $result = false;
        if (is_array($dbUsers)) {
            $dbUser = $dbUsers[array_keys($dbUsers)[0] ?? 0] ?? new Usuarios();
            if ($dbUser->password == md5($password)) {
                $result = $dbUser;
            }
        }
        return $result;
   }
}