<?php

namespace exam\src\domain;

use exam\src\controllers\NavigationController;
use exam\src\models\Usuarios;

/**
 * This is the session main manager
 */
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
    public function addSession(?Usuarios $data): void {
        if (!$this->hasSession()) {
            $token = session_id();
            $_SESSION[$token]['user'] = $data;
        }
    }

    /**
     * updates the current user data in session
     * @param Usuarios $data the user data array
     * @return void
     */
    public function updateSession(Usuarios $data): void {
        if ($this->hasSession()) {
            $token = session_id();
            $_SESSION[$token]['user'] = $data;
        }
    }

    /**
     * updates the current user location to session
     * @param array $view the user view location
     * @return void
     */
    public function updateSessionLocation(array $view): void {
        $token = session_id();
        $_SESSION[$token]['location'] = $view;
    }

    /**
     * gets the current user data from session
     * @return Usuarios if the session contains user data
     * @return null if the session dont contains user data
     */
    public function getSession(): Usuarios|null {
        $result = null;
        if ($this->hasSession()) {
            $token = session_id();
            $result = $_SESSION[$token]['user'] ?? null;
        }
        return $result;
    }

    /**
     * gets the current user location of session
     * @return array $view the user view location
     * @return null if the session dont contains view location
     */
    public function getSessionLocation(): array|null {
        $token = session_id();
        $result = null;
        if(isset($_SESSION[$token]['location'])) {
            $result = $_SESSION[$token]['location'];
        }
        return $result;
    }

    /**
     * Clears the user data from session
     * @return void
     */
    public function clearSession(): void {
        if ($this->hasSession()) {
            $token = session_id();
            $_SESSION[$token]['user'] = null;
            $_SESSION[$token]['carrito'] = null;
            $_SESSION[$token]['location'] = null;
        }
        NavigationController::home();
    }

    /**
     * Check if the session contains user data
     * @return true if the session contains the user data
     * @return false if the session dont contains the user data
     */
    public function hasSession(): bool {
        $token = session_id();
        if (isset($_COOKIE['PHPSESSID'])) {
            $token = $_COOKIE['PHPSESSID'];
        }
        return (isset($_SESSION[$token]) && ($_SESSION[$token]['user'] ?? null) != null);
    }
}