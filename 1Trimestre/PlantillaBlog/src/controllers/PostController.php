<?php
require_once('../src/domain/SessionManager.php');
require_once('../src/validators/FormValidator.php');
require_once('../src/controllers/LoginPostController.php');
require_once('../src/controllers/SigninPostController.php');
require_once('../src/controllers/EntryPostController.php');
require_once('../src/controllers/CategoryPostController.php');
require_once('../src/controllers/UserPostController.php');

$DATA = [
    'title' => 'Plantilla de blog de jose'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {
    $result = true;
    switch ($_POST['submitType']) {
        case SUBMIT_TYPE_LOGOUT:
            clearSession();
            break;
        case SUBMIT_TYPE_SIGNIN: 
            if (!hasSession()) {
                $result = doSigninPost();
            }
            break;
        case SUBMIT_TYPE_LOGIN:
            if (!hasSession()) {
                $result = doLoginPost();
            }
            break;
        case SUBMIT_TYPE_EDIT_ENTRY:
            if (hasSession()) {
                $result = doEntryEditPost();
                if (is_bool($result) && $result) {
                    $DATA['entryUpdate'] = true;
                }
                else {
                    $DATA['entryUpdate'] = false;
                }
            }
            break;
        case SUBMIT_TYPE_NEW_ENTRY:
            if (hasSession()) {
                $result = doEntryNewPost();
                if (is_bool($result) && $result) {
                    $DATA['entryUpdate'] = true;
                }
                else {
                    $DATA['entryUpdate'] = false;
                }
            }
            break;
        case SUBMIT_TYPE_DELETE_ENTRY:
            if (hasSession()) {
                $result = doEntryDeletePost();
                if (is_bool($result) && $result) {
                    header('location: home.php');
                    exit;
                }
            }
            break;
        case SUBMIT_TYPE_NEW_CATEGORY:
            if (hasSession()) {
                $result = doCategoryNewPost();
            }
            break;
        case SUBMIT_TYPE_EDIT_USER:
            if (hasSession()) {
                $result = doUserEditPost();
                if (is_bool($result) && $result) {
                    $tempSession = getSession();
                    $newSession = getUserById($tempSession[USER_ID]);
                    updateSession($newSession);
                    header('location: user.php');
                    exit;
                }
            }
            break;
        case SUBMIT_TYPE_DELETE_USER:
            if (hasSession()) {
                $result = doUserDeletePost();
                if (is_bool($result) && $result) {
                    clearSession();
                    header("location: home.php");
                    exit;
                }
            }
            break;
    }

    if (is_array($result)) {
        $DATA['errors'] = [$_POST['submitType'] => $result];
    }
}
