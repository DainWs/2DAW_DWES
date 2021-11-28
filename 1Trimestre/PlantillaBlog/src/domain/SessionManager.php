<?php
session_start();
function addSession(array $data): void
{
    if (!hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION[$token] = $data;
    }
}

function getSession(): array|null
{
    $result = null;
    if (hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $result = $_SESSION[$token];
    }
    return $result;
}

function clearSession(): void
{
    if (hasSession()) {
        $token = $_COOKIE['PHPSESSID'];
        $_SESSION[$token] = null;
    }
}

function hasSession(): bool
{
    $result = false;
    if (isset($_COOKIE['PHPSESSID'])) {
        $token = $_COOKIE['PHPSESSID'];
        $result = (isset($_SESSION[$token]) && $_SESSION[$token] != null);
    }
    return $result;
}
