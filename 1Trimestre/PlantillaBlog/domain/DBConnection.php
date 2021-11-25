<?php

function getDBConnection(): mysqli {
    return mysqli_connect('localhost', 'root', '', 'BLOG_PROJECT');
}

function saveUser(Array $user): bool {
    $db = getDBConnection();
    $values = validate($db, $user);

    $username = $values['username'];
    $email = $values['email'];
    $password = $values['password'];

    $sql = "INSERT INTO USUARIOS(username, email, password) VALUES ($username, $email, $password);";
    return (mysqli_query($db, $sql)) ? true : false;
}

function getUser(String $username): Array {
    $db = getDBConnection();
    $validUsername = mysqli_real_escape_string($db, $username);

    $data = mysqli_query($db, "SELECT * FROM USUARIOS WHERE username=\"$validUsername\"");

    $user = [
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => $data['password'],
    ];
    return $user;
}

function validate(mysqli $db, Array $array) {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = mysqli_real_escape_string($db, $value);
    }
    return $result;
}