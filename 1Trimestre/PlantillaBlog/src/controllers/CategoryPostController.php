<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBCategoryConnection.php");

/**
 * Do all actions for a category edit post type
 * @return String error mensaje
 * @return true if was successfully complete
 */
function doCategoryNewPost(): String|bool {
    $name = $_POST['name'] ?? '';

    $err = '';
    if (empty($name)) {
        $err = 'You have to specify a name for a new category.';
    } else {
        $category = [
            CATEGORY_NAME => $name
        ];
        saveCategory($category);
    }
    return (!empty($err))? $err : true;
}

function doCategoryDeletePost(): String|bool {
    $id = $_POST['categoryID'] ?? '';

    $err = '';
    if (empty($id)) {
        $err = 'No category id specified.';
    } else {
        deleteCategory($id);
    }
    return (!empty($err))? $err : true;
}