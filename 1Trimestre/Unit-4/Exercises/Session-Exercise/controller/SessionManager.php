<?php

class SessionManager {
    /**
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

    public function addSession($data): String
    {
        session_start();
        $token = $this->genToken();
        if (!$this->hasSession($token)) {
            $_SESSION[$token] = $data;
        }
        return $token;
    }

    public function updateSession($token, $data): void
    {
        session_start();
        if (!$this->hasSession($token)) {
            $_SESSION[$token] = $data;
        } else {
            $token = $this->addSession($data);
        }
        return $token;
    }

    public function hasSession($token)
    {
        session_start();
        return (isset($_SESSION[$token]));
    }

    public function getSession($token)
    {
        session_start();
        $result = null;
        if ($this->hasSession($token)) {
            $result = $_SESSION[$token];
        }
        return $result;
    }

    private function genToken(): String
    {
        return bin2hex(random_bytes(16));
    }
}

$sessionManager = SessionManager::getInstance();
if ($sessionManager->hasSession($_GET['token'])) {
    header("location: views/login.php");
}