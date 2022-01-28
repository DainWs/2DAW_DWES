<?php

namespace src\domain;

use src\controllers\NavigationController;
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
        echo 'adding';
        if (!$this->hasSession()) {
            $token = session_id();
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
            $token = session_id();
            $_SESSION[$token] = $data;
        }
    }

    /**
     * updates the current user location to session
     * @param String $view the user view location
     * @return void
     */
    public function updateSessionLocation(String $view): void {
        $token = session_id();
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
            $token = session_id();
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
        $token = session_id();
        $result = null;
        if(isset($_SESSION["$token-location"])) {
            $result = $_SESSION["$token-location"];
        }
        return $result;
    }

    /**
     * @deprecated
     */
    public function isAllowedLocation(): bool {
        $rol = $this->getSession()->rol;
        $location = $this->getSessionLocation();
        
        $minLevel = ROL_UNDEFINED_LEVEL;
        if (str_contains($location, 'administration')) {
            $minLevel = ROL_ADMIN_LEVEL;
        }
        else if (str_contains($location, 'proveedores')) {
            $minLevel = ROL_PROVEEDOR_LEVEL;
        }
        else if (str_contains($location, 'profile')) {
            $minLevel = ROL_CLIENTE_LEVEL;
        }

        return $rol >= $minLevel;
    }

    /**
     * Clears the user data from session
     * @return void
     */
    public function clearSession(): void {
        if ($this->hasSession()) {
            $token = session_id();
            $_SESSION[$token] = null;
            $_SESSION["$token-location"] = null;
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
        return (isset($_SESSION[$token]) && $_SESSION[$token] != null);
    }
}