<?php

namespace src\controllers;
use src\controllers\RutePostController;

/**
 * This is the controller for POST methods
 */
class PostController {
    static $DATA = [
        'title' => 'Senderismo'
    ];

    public function __construct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {
            $result = true;
            switch ($_POST['submitType']) {
                case SUBMIT_TYPE_EDIT_RUTE:
                    $result = (new RutePostController())->doRuteEditPost();
                    if (is_bool($result) && $result) {
                        SELF::$DATA['ruteUpdate'] = true;
                    } else {
                        SELF::$DATA['ruteUpdate'] = false;
                    }
                    break;
                case SUBMIT_TYPE_ADD_RUTE:
                    $result = (new RutePostController())->doRuteNewPost();
                    if (is_bool($result) && $result) {
                        SELF::$DATA['ruteUpdate'] = true;
                        echo 'success';
                    } else {
                        SELF::$DATA['ruteUpdate'] = false;
                    }
                    break;
                case SUBMIT_TYPE_DELETE_RUTE:
                    $result = (new RutePostController())->doRuteDeletePost();
                    break;
            }
    
            if (is_array($result)) {
                SELF::$DATA['errors'] = [$_POST['submitType'] => $result];
            }
        }
    }
}