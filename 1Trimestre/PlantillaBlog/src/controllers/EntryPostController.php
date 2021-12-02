<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBEntryConnection.php");

/**
 * Do all actions for a entry edit post type
 * @return String error mensaje
 * @return true if was successfully complete
 */
function doEntryEditPost(): String|bool {
    $id = $_POST['entryId'] ?? '';
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    $err = '';
    if (empty($title) || empty($author) || empty($category) || empty($content)) {
        $err = 'You have to specify a title, author, category and content.';
    } else if (empty($id)) {
        $err = 'The id cant be null.';
    } else {
        $entry = [
            ENTRY_ID => $id,
            ENTRY_USER_ID => $author,
            ENTRY_CATEGORY_ID => $category,
            ENTRY_TITLE => $title,
            ENTRY_DESCRIPTION => $content
        ];
        updateEntry($entry);
    }
    return (!empty($err))? $err : true;
}

/**
 * Do all actions for a entry edit post type
 * @return String error mensaje
 * @return true if was successfully complete
 */
function doEntryNewPost(): String|bool {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    $err = '';
    if (empty($title) || empty($author) || empty($category) || empty($content)) {
        $err = 'You have to specify a title, author, category and content.';
    } else {
        $entry = [
            ENTRY_USER_ID => $author,
            ENTRY_CATEGORY_ID => $category,
            ENTRY_TITLE => $title,
            ENTRY_DESCRIPTION => $content
        ];
        saveEntry($entry);
    }
    return (!empty($err))? $err : true;
}

function doEntryDeletePost(): String|bool {
    $id = $_POST['entryID'] ?? '';

    $err = '';
    if (empty($id)) {
        $err = 'No entry id specified.';
    } else {
        deleteEntry($id);
    }
    return (!empty($err))? $err : true;
}