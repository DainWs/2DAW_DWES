<?php

namespace src\controllers;

use Exception;
use src\models\Comentario;
use src\services\DBComentarioConnection;

/**
 * This is the Post method controller for Comments post type
 */
class CommentPostController {
    public function __construct() {
    }

    /**
     * Do all actions for a comment edit post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doCommentEditPost(): Array|bool {
        $id = $_POST['id'] ?? '';
        $id_ruta = $_POST['id_ruta'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $texto = $_POST['texto'] ?? '';

        $err = [];
        if (validateIsEmpty($id)) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }

        if (validateIsEmpty($id_ruta)) {
            $err['id_ruta']= 'You have to specify a comment';
        }

        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $comment = new Comentario();
                $comment->setId($id)
                    ->setId_ruta($id_ruta)
                    ->setNombre($nombre)
                    ->setTexto($texto);
                $result = (new DBComentarioConnection())->update($comment);
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
     * Do all actions for a comment new post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doCommentNewPost(): Array|bool {
        $id_ruta = $_POST['id_ruta'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $texto = $_POST['texto'] ?? '';

        $err = [];
        if (validateIsEmpty($id_ruta)) {
            $err['id_ruta']= 'You have to specify a comment';
        }

        if (validateIsEmpty($nombre)) {
            $err['nombre']= 'You have to specify a name';
        }

        if (validateIsEmpty($texto)) {
            $err['texto']= 'You have to specify a text';
        }

        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $comment = new Comentario();
                $comment->setId(0)
                    ->setId_ruta($id_ruta)
                    ->setNombre($nombre)
                    ->setTexto($texto)
                    ->setFecha(date('Y-m-d H:i:s'));
                $result = (new DBComentarioConnection())->insert($comment);
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
     * Do all actions for a comment delete post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doCommentDeletePost(): Array|bool {
        $id = $_POST['id'] ?? '';
        $id_ruta = $_POST['id_ruta'] ?? '';

        $err = [];
        if (validateIsEmpty($id) || validateIsEmpty($id_ruta)) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }
        
        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $result =  (new DBComentarioConnection())->delete($id);
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
}