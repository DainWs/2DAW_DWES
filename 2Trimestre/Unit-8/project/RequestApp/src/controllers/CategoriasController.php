<?php

namespace src\controllers;

use src\controllers\PostController;
use Exception;
use Monolog\Logger;
use src\domain\validators\FormValidator;
use src\models\Categorias;
use src\services\db\DBTableCategorias;

class CategoriasController extends PostController {

    /**
     * Do all actions for a category new post type
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doCategoryNewPost(): bool {
        $name = $_POST['name'] ?? '';

        $errors = [];
        if (FormValidator::validateIsEmpty($name)) {
            $errors['others'] = 'You have to specify a name for a new category.';
        } else {
            try {
                $table = new DBTableCategorias();
                $category = $table->queryWhereName($name);
                if ($category && count($category) > 0) {
                    $errors['others'] = 'There is already a category with that name.';
                }
            }
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $errors['others']= 'An unknown error was success, please try it again more later.';
            }
        } 
        
        $result = true;
        if (count($errors) == 0) {
            // DB Access exception control
            try {
                $category = new Categorias();
                $category->id = 0;
                $category->nombre = $name;

                $table = new DBTableCategorias();
                $result = $table->insert($category);
            }
            catch(Exception $ex) {
                $this->logger->log("[Error] ".$ex->getMessage(), Logger::WARNING);
                $result = false;
            }
            finally {
                if ($result) {
                   NavigationController::home();
                } else {
                    $errors['others']= 'An unknown error was success, please try it again more later.';
                }
            }
        }
        $this->errors[CONTROLLER_CATEGORY_NEW] = $errors;
        return (count($errors) > 0);
    }
}