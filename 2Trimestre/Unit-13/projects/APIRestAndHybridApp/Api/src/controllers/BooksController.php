<?php

namespace src\controllers;

use src\models\Books;
use src\services\db\DBTableBooks;

/**
 * This is the controller of Ajax requests
 */
class BooksController extends PostController {

    /**
     * Manage the diferent request methods actions for a simple book
     */
    public function book(): void {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->getBook();
                break;
            default:
                echo "METHOD NOT ALLOWED";
                break;
        }
        exit(0);
    }

    private function getBook() {
        $id = $_GET['id'] ?? '';
        $table = new DBTableBooks();
        $book = $table->queryWith($id);
        echo json_encode(($book) ? $book[0] : new Books());
    }

    /**
     * Manage the diferent request methods actions for a collection of books
     */
    public function books(): void {
        switch ($_SERVER['REQUEST_METHOD']) {
            case 'GET':
                $this->getBooks();
                break;
            default:
                echo "METHOD NOT ALLOWED";
                break;
        }
        exit(0);
    }

    private function getBooks() {
        $name = $_GET['name'] ?? '';
        $order = $_GET['order'] ?? 'id';
        $orderType = $_GET['orderType'] ?? SQL_ORDER_ASC;

        $table = new DBTableBooks();
        $books = $table->query($name, $order, $orderType);
        echo json_encode($books);
    }
}