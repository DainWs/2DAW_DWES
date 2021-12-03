<?php
require_once('../src/controllers/LoginPostController.php');
require_once('../src/controllers/SigninPostController.php');
require_once('../src/controllers/EntryPostController.php');
require_once('../src/controllers/CategoryPostController.php');

$DATA = [
    'title' => 'Plantilla de blog de jose',
    'showSessionForms' => true
];

if (hasSession()) {
    $DATA['showSessionForms'] = false;
}

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
                if (is_string($result)) {
                    $DATA['errors'] = [0 => $result];
                } else {
                    $DATA['showSessionForms'] = !$result;
                }
            }
            break;
        case SUBMIT_TYPE_LOGIN:
            if (!hasSession()) {
                $result = doLoginPost();
                if (is_string($result)) {
                    $DATA['errors'] = [0 => $result];
                } else {
                    $DATA['showSessionForms'] = !$result;
                }
            }
            break;
        case SUBMIT_TYPE_EDIT_ENTRY:
            if (hasSession()) {
                $result = doEntryEditPost();
                if (is_string($result)) {
                    $DATA['errors'] = [0 => $result];
                }
            }
            break;
        case SUBMIT_TYPE_NEW_ENTRY:
            if (hasSession()) {
                $result = doEntryNewPost();
                if (is_string($result)) {
                    $DATA['errors'] = [0 => $result];
                }
            }
            break;
        case SUBMIT_TYPE_DELETE_ENTRY:
            if (hasSession()) {
                $result = doEntryDeletePost();
                if (is_string($result)) {
                    $DATA['errors'] = [0 => $result];
                }
            }
            break;
        case SUBMIT_TYPE_NEW_CATEGORY:
            if (hasSession()) {
                $result = doCategoryNewPost();
                if (is_string($result)) {
                    $DATA['errors'] = [SUBMIT_TYPE_NEW_CATEGORY => $result];
                }
            }
            break;
    }
}