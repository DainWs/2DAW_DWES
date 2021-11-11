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
    public function addSession(Array $data): String
    {
        session_start();
        $token = $this->genToken();
        if (!$this->hasSession($token)) {
            $_SESSION[$token] = $data;
        }
        return $token;
    }

    /**
     * Update a client session data identified by a token
     * if the token do not exist, we will create the session with
     * the given data and return the new Token for this one.
     * Dont lose the token pls!!!
     * @return String the session identifier/token
     */
    public function updateSession(String $token, Array $data): String
    {
        session_start();
        if (!$this->hasSession($token)) {
            $_SESSION[$token] = $data;
        } else {
            $token = $this->addSession($data);
        }
        return $token;
    }

    /**
     * Check if a session with the given token exists
     * @return true if exist
     * @return false if not exist
     */
    public function hasSession(String $token): bool
    {
        session_start();
        return (isset($_SESSION[$token]));
    }

    /**
     * return the session identified by the given token, if
     * the token does not exist, then return null
     */
    public function getSession(String $token): Array|null
    {
        session_start();
        $result = null;
        if ($this->hasSession($token)) {
            $result = $_SESSION[$token];
        }
        return $result;
    }

    /**
     * Generate a random unique token of 16 bytes as hex
     * @return String the token generated
     */
    private function genToken(): String
    {
        return bin2hex(random_bytes(16));
    }
}

function doCurrentSessionControl() {
    $sessionManager = SessionManager::getInstance();
    $hasSession = (isset($_COOKIE['token']) && $sessionManager->hasSession($_COOKIE['token']));
    if (!$hasSession) {
        header("location: views/login.php");
        exit;
    }
}