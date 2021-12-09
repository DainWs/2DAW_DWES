<?php
require_once("../src/config/constants.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBEntryConnection.php");

/**
 * Do all actions for a entry edit post type
 * @return Array of error mensajes
 * @return true if was successfully complete
 * @return false if has errors
 */
function doEntryEditPost(): Array|bool {
    $id = $_POST['entryId'] ?? '';
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    $err = [];
    if (validateIsEmpty($id)) {
        $err['others']= 'An unknown error was success, please try it again more later.';
    }

    if (validateIsEmpty($title)) {
        $err['title'] = 'You have to specify a title.';
    }

    if (validateIsEmpty($author)) {
        $err['author'] = 'You have to specify a author.';
    }

    if (validateIsEmpty($category)) {
        $err['category'] = 'You have to specify a category.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $entry = [
                ENTRY_ID => $id,
                ENTRY_USER_ID => $author,
                ENTRY_CATEGORY_ID => $category,
                ENTRY_TITLE => $title,
                ENTRY_DESCRIPTION => $content
            ];
            $result = updateEntry($entry);
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

/**
 * Do all actions for a entry new post type
 * @return Array of error mensajes
 * @return true if was successfully complete
 * @return false if has errors
 */
function doEntryNewPost(): Array|bool {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    $err = [];
    if (validateIsEmpty($title)) {
        $err['title'] = 'You have to specify a title.';
    }

    if (validateIsEmpty($author)) {
        $err['author'] = 'You have to specify a author.';
    }

    if (validateIsEmpty($category)) {
        $err['category'] = 'You have to specify a category.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $entry = [
                ENTRY_USER_ID => $author,
                ENTRY_CATEGORY_ID => $category,
                ENTRY_TITLE => $title,
                ENTRY_DESCRIPTION => $content
            ];
            $result = saveEntry($entry);
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

/**
 * Do all actions for a entry delete post type
 * @return Array of error mensajes
 * @return true if was successfully complete
 * @return false if has errors
 */
function doEntryDeletePost(): Array|bool {
    $id = $_POST['entryID'] ?? '';

    $err = [];
    if (validateIsEmpty($id)) {
        $err['others']= 'An unknown error was success, please try it again more later.';
    }

    $result = true;
    if (count($err) == 0) {
        // DB Access exception control
        try {
            $result = deleteEntry($id);
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