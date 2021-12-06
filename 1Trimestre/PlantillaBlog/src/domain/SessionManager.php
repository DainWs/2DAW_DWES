<?php
session_start();

/**
 * Adds the current user data to session
 * @param array $data the user data array
 * @return void
 */
function addSession(array $data): void {
    if (!hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION[$token] = $data;
    }
}

/**
 * updates the current user data in session
 * @param array $data the user data array
 * @return void
 */
function updateSession(array $data): void {
    if (hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION[$token] = $data;
    }
}
/**
 * gets the current user data from session
 * @return array if the session contains user data
 * @return null if the session dont contains user data
 */
function getSession(): array|null {
    $result = null;
    if (hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $result = $_SESSION[$token];
    }
    return $result;
}

/**
 * Clears the user data from session
 * @return void
 */
function clearSession(): void {
    if (hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION[$token] = null;
    }
}

/**
 * Check if the session contains user data
 * @return true if the session contains the user data
 * @return false if the session dont contains the user data
 */
function hasSession(): bool {
    $result = false;
    if (isset($_COOKIE['PHPSESSID'])) {
        $token = $_COOKIE['PHPSESSID'];
        $result = (isset($_SESSION[$token]) && $_SESSION[$token] != null);
    }
    return $result;
}
