<?php
require_once('../src/domain/SessionManager.php');
require_once('../src/controllers/LoginPostController.php');
require_once('../src/controllers/SigninPostController.php');
require_once('../src/controllers/EntryPostController.php');
require_once('../src/controllers/CategoryPostController.php');
require_once('../src/controllers/UserPostController.php');

$DATA = [
    'title' => 'Plantilla de blog de jose'
];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {
    switch ($_POST['submitType']) {
        case SUBMIT_TYPE_LOGOUT:
            if (hasSession()) {
                clearSession();
                $DATA['showSessionForms'] = true;
            }
            break;
        case SUBMIT_TYPE_SIGNIN: 
            if (!hasSession()) {
                $result = doSigninPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_SIGNIN => $result];
                }
            }
            break;
        case SUBMIT_TYPE_LOGIN:
            if (!hasSession()) {
                $result = doLoginPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_LOGIN => $result];
                }
            }
            break;
        case SUBMIT_TYPE_EDIT_ENTRY:
            if (hasSession()) {
                $result = doEntryEditPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_EDIT_ENTRY => $result];
                }
            }
            break;
        case SUBMIT_TYPE_NEW_ENTRY:
            if (hasSession()) {
                $result = doEntryNewPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_NEW_ENTRY => $result];
                }
            }
            break;
        case SUBMIT_TYPE_DELETE_ENTRY:
            if (hasSession()) {
                $result = doEntryDeletePost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_DELETE_ENTRY => $result];
                }
            }
            break;
        case SUBMIT_TYPE_NEW_CATEGORY:
            if (hasSession()) {
                $result = doCategoryNewPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_NEW_CATEGORY => $result];
                }
            }
            break;
        case SUBMIT_TYPE_EDIT_USER:
            if (hasSession()) {
                $result = doUserEditPost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_EDIT_USER => $result];
                } else if ($result) {
                    $tempSession = getSession();
                    $newSession = getUserById($tempSession[USER_ID]);
                    updateSession($newSession);
                }
            }
            break;
        case SUBMIT_TYPE_DELETE_USER:
            if (hasSession()) {
                $result = doUserDeletePost();
                if (is_array($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_DELETE_USER => $result];
                } else if ($result) {
                    clearSession();
                    header("location: home.php");
                    exit;
                }
            }
            break;
    }
}
