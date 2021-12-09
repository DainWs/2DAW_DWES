<?php
require_once("../src/config/constants.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBCategoryConnection.php");

/**
 * Do all actions for a category new post type
 * @return Array of error mensajes
 * @return true if was successfully complete
 * @return false if has errors
 */
function doCategoryNewPost(): Array|bool {
    $name = $_POST['name'] ?? '';

    $err = [];
    if (validateIsEmpty($name)) {
        $err['others'] = 'You have to specify a name for a new category.';
    } else {
        try {
            if (existCategoryWithName($name)) {
                $err['others'] = 'There is already a category with that name.';
            }
        }
        catch(Exception $ex) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    } 
    
    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $category = [ CATEGORY_NAME => $name ];
            $result = saveCategory($category);
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