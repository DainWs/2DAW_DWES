<?php

namespace src\controllers;

class MainController {

    public static function processPost(): void {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitType'])) {
            switch ($_POST['submitType']) {
                case SUBMIT_TYPE_SIGNIN:
                    break;
                case SUBMIT_TYPE_LOGIN:
                    break;
                case SUBMIT_TYPE_LOGOUT:
                    break;
                case SUBMIT_TYPE_ADD_USER:
                    break;
                case SUBMIT_TYPE_EDIT_USER:
                    break;
                case SUBMIT_TYPE_DELETE_USER:
                    break;
                case SUBMIT_TYPE_ADD_CATEGORY:
                    break;
                case SUBMIT_TYPE_DELETE_CATEGORY:
                    break;
                case SUBMIT_TYPE_ADD_PRODUCT:
                    break;
                case SUBMIT_TYPE_EDIT_PRODUCT:
                    break;
                case SUBMIT_TYPE_DELETE_PRODUCT:
                    break;
                case SUBMIT_TYPE_ADD_PEDIDOS:
                    break;
                case SUBMIT_TYPE_EDIT_PEDIDOS:
                    break;
                case SUBMIT_TYPE_DELETE_PEDIDOS:
                    break;
                case SUBMIT_TYPE_ADD_LINEA_PEDIDO:
                    break;
                case SUBMIT_TYPE_EDIT_LINEA_PEDIDO:
                    break;
                case SUBMIT_TYPE_DELETE_LINEA_PEDIDO:
                    break;
                default:
                    break;
            }
        }
    }

    public static function processAjaxPost(): string {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && ($_POST['ajaxRequest'] ?? false) ) {

        }
        return '';
    }

}