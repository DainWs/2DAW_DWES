<?php

namespace src\controllers;

class MainController {

    public static function processPost(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {

        }
    }

    public static function processAjaxPost(): string {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['ajaxRequest'] ?? false) ) {

        }
        return '';
    }

}