<?php
/**
 * Save the sended user data (represented by an Array) in the database
 * @param Array $user The user data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function saveUser(Array $user): bool {
    //Open the connection
    $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
    $values = validate($connection, $user);

    $nombre = $values[USER_NAME];
    $apellidos = $values[USER_SURNAME];
    $email = $values[USER_EMAIL];
    // Password encrypted with MD5
    $password = md5($values[USER_PASSWORD]);
    $fecha = $values[USER_DATE] ?? date('Y-m-d H:i:s');

    //make INSERT SQL Sentence
    $sql = "INSERT INTO USUARIOS(".USER_NAME.", ".USER_SURNAME.", ".USER_EMAIL.", ".USER_PASSWORD.", ".USER_DATE.") ".
            "VALUES ($nombre, $apellidos, $email, $password, $fecha);";
    
    // Execute the SQL Sentence
    $result = (mysqli_query($connection, $sql)) ? true : false;

    //Close the connection
    $connection->close();
    return $result;
}

/**
 * Returns the user where the email are equals to the sended one.
 * @param String $email The unique email of the user
 * @return Array the represented user data as array
 */
function getUserByEmail(String $email): Array {
    //Open the connection
    $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
    $validEmail = mysqli_real_escape_string($connection, $email);
    
    //make SQL Sentence
    $sql = "SELECT * FROM USUARIOS WHERE ".USER_EMAIL."=\"$validEmail\"";
    
    // Execute the SQL Sentence
    $data = mysqli_query($connection, $sql);

    $user = [
        USER_ID => $data[USER_ID],
        USER_NAME => $data[USER_NAME],
        USER_SURNAME => $data[USER_SURNAME],
        USER_EMAIL => $data[USER_EMAIL],
        USER_PASSWORD => $data[USER_PASSWORD],
        USER_DATE => $data[USER_DATE]
    ];
    return $user;
}

/**
 * Returns the user where the id are equals to the sended one.
 * 
 * This method should not be called for user data validation purposes.
 * for this purpose call getUserByEmail($email)
 * @param String $id The id of the user
 * @return Array the represented user data as array
 */
function getUserByID(int $id): Array {
    //Open the connection
    $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

    //make SQL Sentence
    $sql = "SELECT * FROM USUARIOS WHERE ".USER_ID."=$id";

    // Execute the SQL Sentence
    $data = mysqli_query($connection, $sql);

    var_dump($data);

    $user = [
        USER_ID => $data[USER_ID],
        USER_NAME => $data[USER_NAME],
        USER_SURNAME => $data[USER_SURNAME],
        USER_EMAIL => $data[USER_EMAIL],
        USER_PASSWORD => $data[USER_PASSWORD],
        USER_DATE => $data[USER_DATE]
    ];
    return $user;
}

/**
 * Validate the given array preventing INSERTIONS with the given connection
 * @param MYSQLI $connection the sql connection with the db
 * @param Array $array the given array
 * @return Array the validated array
 */
function validate(mysqli $connection, Array $array): Array {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = mysqli_real_escape_string($connection, $value);
    }
    return $result;
}