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
    if (empty($name)) {
        $err[CATEGORY_NAME] = 'You have to specify a name for a new category.';
    } 
    
    $result = true;
    if (count($err) == 0) {
        $category = [
            CATEGORY_NAME => $name
        ];
        $result = saveCategory($category);
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
    if (empty($id)) {
        $err[CATEGORY_ID] = 'No category id specified.';
    } 

    $result = true;
    if (count($err) == 0) {
        $result = deleteCategory($id);
    }
    return (count($err) > 0) ? $err : $result;
}