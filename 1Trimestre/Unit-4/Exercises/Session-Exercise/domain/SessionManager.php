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

function hasSession(): bool
{
    $token = $_COOKIE['PHPSESSID'];
    return (isset($_SESSION[$token]) && $_SESSION[$token] != null);
}
