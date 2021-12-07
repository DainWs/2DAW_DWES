<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBCategoryConnection.php");

/**
 * Do all actions for a category edit post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doCategoryNewPost(): Array|bool {
    $name = $_POST['name'] ?? '';

    $err = [];
    if (validateIsEmpty($name)) {
        $err['others'] = 'You have to specify a name for a new category.';
    } 
    
    $result = true;
    if (count($err) == 0) {
        $category = [
            CATEGORY_NAME => $name
        ];
        $result = saveCategory($category);
        if (!$result) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    }
    return (count($err) > 0) ? $err : $result;
}

/**
 * Do all actions for a category delete post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doCategoryDeletePost(): String|bool {
    $id = $_POST['categoryID'] ?? '';

    $err = [];
    if (validateIsEmpty($id)) {
        $err['categoryID'] = 'No category id specified.';
    } 

    $result = true;
    if (count($err) == 0) {
        $result = deleteCategory($id);
        if (!$result) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
    }
    return (count($err) > 0) ? $err : $result;
}