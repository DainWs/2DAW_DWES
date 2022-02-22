<?php

namespace exam\src\domain;

use DateTime;

/**
 * This is the cookie main manager
 */
class CookiesManager {

    private static CookiesManager $instance;

    public static function getInstance(): CookiesManager {
        if (!isset(CookiesManager::$instance)) {
            CookiesManager::$instance = new CookiesManager();
        }
        return CookiesManager::$instance;
    }

    private function __construct() {}

    /**
     * sets a cookie
     * @param Object $data
     * @return void
     */
    public function setCookie($key, $value, $expirationDate = null): void {
        if ($expirationDate) {
            setcookie($key, $value, $expirationDate);
        } else {
            setcookie($key, $value);
        }
    }

    /**
     * get data from cookie
     */
    public function getCookie($key) {
        return $_COOKIE[$key] ?? null;
    }

    /**
     * Clears a cookie
     * @return void
     */
    public function clearCookie($key): void {
        setcookie($key, '', (new DateTime())->getTimestamp());
    }

    /**
     * Check if the cookie exists
     * @return true if the cookie contains the data
     * @return false if the cookie dont exists
     */
    public function hasCookie($key): bool {
        return (isset($_COOKIE[$key]));
    }
}