<?php
require_once("../src/config/constants.php");
require_once("../src/domain/LangManager.php");
require_once("../src/domain/SessionManager.php");
require_once("../src/services/db/DBEntryConnection.php");

/**
 * Do all actions for a entry edit post type
 * @return Array error mensaje
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
    if (empty($id)) {
        $err[ENTRY_ID] = 'You have to specify a entry id.';
    }

    if (empty($title)) {
        $err[ENTRY_TITLE] = 'You have to specify a title.';
    }

    if (empty($author)) {
        $err[ENTRY_USER] = 'You have to specify a author.';
    }

    if (empty($category)) {
        $err[ENTRY_CATEGORY] = 'You have to specify a category.';
    }

    $result = true;
    if (count($err) == 0) {
        $entry = [
            ENTRY_ID => $id,
            ENTRY_USER_ID => $author,
            ENTRY_CATEGORY_ID => $category,
            ENTRY_TITLE => $title,
            ENTRY_DESCRIPTION => $content
        ];
        $result = updateEntry($entry);
    }
    return (count($err) > 0) ? $err : $result;
}

/**
 * Do all actions for a entry edit post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doEntryNewPost(): Array|bool {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $category = $_POST['category'] ?? '';
    $content = $_POST['content'] ?? '';

    $err = [];
    if (empty($title)) {
        $err[ENTRY_TITLE] = 'You have to specify a title.';
    }

    if (empty($author)) {
        $err[ENTRY_USER] = 'You have to specify a author.';
    }

    if (empty($category)) {
        $err[ENTRY_CATEGORY] = 'You have to specify a category.';
    }

    $result = true;
    if (count($err) == 0) {
        $entry = [
            ENTRY_USER_ID => $author,
            ENTRY_CATEGORY_ID => $category,
            ENTRY_TITLE => $title,
            ENTRY_DESCRIPTION => $content
        ];
        $result = saveEntry($entry);
    }
    return (count($err) > 0) ? $err : $result;
}

/**
 * Do all actions for a entry delete post type
 * @return Array error mensaje
 * @return true if was successfully complete
 * @return false if has errors
 */
function doEntryDeletePost(): Array|bool {
    $id = $_POST['entryID'] ?? '';

    $err = [];
    if (empty($id)) {
        $err[ENTRY_ID] = 'No entry id specified.';
    }

    $result = true;
    if (count($err) == 0) {
        $result = deleteEntry($id);
    }
    return (count($err) > 0) ? $err : $result;
}