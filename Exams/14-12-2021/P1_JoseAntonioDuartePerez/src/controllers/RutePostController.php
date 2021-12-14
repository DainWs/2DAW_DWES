<?php

namespace src\controllers;

use Exception;
use NumberFormatter;
use src\models\Ruta;
use src\models\Comentario;
use src\validators\FormValidator;
use src\services\DBRuteConnection;

/**
 * This is the Post method controller for Rute post type
 */
class RutePostController {
    public function __construct() {
    }

    /**
     * Do all actions for a rute edit post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doRuteEditPost(): Array|bool {
        $id = $_POST['id'] ?? '';
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $desnivel = (!empty($_POST['desnivel']??'')) ? $_POST['desnivel'] : "-1";
        $distancia = (!empty($_POST['distancia']??'')) ? $_POST['distancia'] : "-1";
        $notas = $_POST['notas'] ?? '';
        $dificult = (!empty($_POST['dificultad']??'')) ? $_POST['dificultad'] : "-1";

        $err = [];
        if (validateIsEmpty($id)) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }

        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $rute = new Ruta();
                $rute->setId($id)
                    ->setTitulo($title)
                    ->setDescripcion($description)
                    ->setDesnivel((int)$desnivel)
                    ->setDistancia((int)$distancia)
                    ->setNotas($notas)
                    ->setDificultad((int)$dificult);
                $result = (new DBRuteConnection())->update($rute);
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
     * Do all actions for a rute new post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doRuteNewPost(): Array|bool {
        $title = $_POST['title'] ?? '';
        $description = $_POST['description'] ?? '';
        $desnivel = $_POST['desnivel'] ?? '';
        $distancia = $_POST['distancia'] ?? '';
        $notas = $_POST['notas'] ?? '';
        $dificult = $_POST['dificultad'] ?? '';

        $err = [];
        if (validateIsEmpty($title)) {
            $err['title'] = 'You have to specify a title.';
        }

        if (validateIsEmpty($desnivel)) {
            $err['author'] = 'You have to specify a desnivel.';
        }

        if (validateIsEmpty($distancia)) {
            $err['category'] = 'You have to specify a distance.';
        }

        if (validateIsEmpty($dificult)) {
            $err['category'] = 'You have to specify a dificult.';
        }

        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $rute = new Ruta();
                $rute->setId(0)
                    ->setTitulo($title)
                    ->setDescripcion($description)
                    ->setDesnivel($desnivel)
                    ->setDistancia($distancia)
                    ->setNotas($notas)
                    ->setDificultad($dificult);
                $result = (new DBRuteConnection())->insert($rute);
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
     * Do all actions for a rute delete post type
     * @return Array of error mensajes
     * @return true if was successfully complete
     * @return false if has errors
     */
    public function doRuteDeletePost(): Array|bool {
        $id = $_POST['id'] ?? '';

        $err = [];
        if (validateIsEmpty($id)) {
            $err['others']= 'An unknown error was success, please try it again more later.';
        }

        $result = true;
        if (count($err) == 0) {
            // DB Access exception control
            try {
                $result =  (new DBRuteConnection())->delete($id);
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