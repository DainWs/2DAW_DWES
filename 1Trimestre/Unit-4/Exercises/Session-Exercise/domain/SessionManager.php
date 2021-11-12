<?php
/**
 * Session manager singleton class.
 * Use SessionManager::getInstance() to get an instance
 * 
 * @author Jose Antonio Duarte Perez
 */
class SessionManager {
    /**
     * This is the SessionManager instance
     * @var $instance SessionManager
     */
    private static $instance = null;

    public static function getInstance() : SessionManager 
    {
        if (!isset($instance)) {
            $instance = new SessionManager();
        }
        return $instance;
    }

    /**
     * Add a client session, this method return 
     * the token identifier for this session.
     * Dont lose it!!!
     * @return String the session identifier/token
     */
    public function addSession(Array $data): void
    {
        session_start();
        $token = $this->getToken();
        if (!$this->hasSession($token)) {
            $_SESSION[$token] = $data;
        }
    }

    /**
     * Check if a session with the given token exists
     * @return true if exist
     * @return false if not exist
     */
    public function hasSession(): bool
    {
        session_start();
        $token = $this->getToken();
        return (isset($_SESSION[$token]) && $_SESSION[$token] != null);
    }

    /**
     * return the session identified by the given token, if
     * the token does not exist, then return null
     */
    public function getSession(): Array|null
    {
        session_start();
        $token = $this->getToken();
        $result = null;
        if ($this->hasSession($token)) {
            $result = $_SESSION[$token];
        }
        return $result;
    }

    public function getToken(): String
    {
        return $_COOKIE['PHPSESSID'];
    }
}

function hasSession(): bool {
    $sessionManager = SessionManager::getInstance();
    $result = $sessionManager->hasSession();
    return $result;
 }

function doCurrentSessionControl() {
    $sessionManager = SessionManager::getInstance();
    if (!$sessionManager->hasSession()) {
        header("location: views/login.php");
        exit;
    }
}