<?php

namespace src\domain;

use src\models\Usuarios;

class SessionManager {

    private static SessionManager $instance;

    public static function getInstance(): SessionManager {
        if (!isset(SessionManager::$instance)) {
            SessionManager::$instance = new SessionManager();
        }
        return SessionManager::$instance;
    }

    private function __construct() {
        session_start();
    }

    /**
     * Adds the current user data to session
     * @param Usuarios $data the user data array
     * @return void
     */
    public function addSession(Usuarios $data): void {
        if (!$this->hasSession()) {
            $token = $_COOKIE['PHPSESSID'];
            $_SESSION[$token] = $data;
        }
    }

    /**
     * updates the current user data in session
     * @param Usuarios $data the user data array
     * @return void
     */
    public function updateSession(Usuarios $data): void {
        if ($this->hasSession()) {
            $token = $_COOKIE['PHPSESSID'];
            $_SESSION[$token] = $data;
        }
    }

    /**
     * updates the current user location to session
     * @param String $view the user view location
     * @return void
     */
    public function updateSessionLocation(String $view): void {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION["$token-location"] = $view;
    }

    /**
     * gets the current user data from session
     * @return Usuarios if the session contains user data
     * @return null if the session dont contains user data
     */
    public function getSession(): Usuarios|null {
        $result = null;
        if ($this->hasSession()) {
            $token = $_COOKIE['PHPSESSID'];
            $result = $_SESSION[$token];
        }
        return $result;
    }

    /**
     * gets the current user location of session
     * @return String $view the user view location
     * @return null if the session dont contains view location
     */
    public function getSessionLocation(): String|null {
        $token = $_COOKIE['PHPSESSID'];
        $result = $_SESSION["$token-location"];
        return $result;
    }

    /**
     * Clears the user data from session
     * @return void
     */
    public function clearSession(): void {
        if ($this->hasSession()) {
            $token = $_COOKIE['PHPSESSID'];
            $_SESSION[$token] = null;
            $_SESSION["$token-location"] = null;
        }
    }

    /**
     * Check if the session contains user data
     * @return true if the session contains the user data
     * @return false if the session dont contains the user data
     */
    public function hasSession(): bool {
        $result = false;
        if (isset($_COOKIE['PHPSESSID'])) {
            $token = $_COOKIE['PHPSESSID'];
            $result = (isset($_SESSION[$token]) && $_SESSION[$token] != null);
        }
        return $result;
    }

}