<?php
/**
 * Save the sended user data (represented by an Array) in the database
 * @param Array $user The user data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 * TODO replace the false return to the error string
 */
function saveUser(Array $user): bool {
    $result = false;
    try {
        if (!existUserWithEmail($user[USER_EMAIL])) {
            //Open the connection
            $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
            $values = validateUser($connection, $user);
            
            $nombre = $values[USER_NAME];
            $apellidos = $values[USER_SURNAME];
            $email = $values[USER_EMAIL];
            // Password encrypted with MD5
            $password = md5($values[USER_PASSWORD]);
            $fecha = $values[USER_DATE] ?? date('Y-m-d H:i:s');

            //make INSERT SQL Sentence
            $sql = "INSERT INTO USUARIOS(".USER_NAME.", ".USER_SURNAME.", ".USER_EMAIL.", ".USER_PASSWORD.", ".USER_DATE.") ".
                    "VALUES (\"$nombre\", \"$apellidos\", \"$email\", \"$password\", \"$fecha\");";
            
            // Execute the SQL Sentence
            $result = (mysqli_query($connection, $sql)) ? true : false;
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $result;
}


/**
 * Update the sended user data (represented by an Array) in the database
 * @param Array $user The user data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function updateUser(Array $user): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $values = validateUser($connection, $user);

        $id = $values[USER_ID];
        $nombre = $values[USER_NAME];
        $apellidos = $values[USER_SURNAME];
        $email = $values[USER_EMAIL];
        // Password encrypted with MD5
        $password = md5($values[USER_PASSWORD]);

        //make UPDATE SQL Sentence
        $sql = "UPDATE USUARIOS SET ";

        $dataCount = 0;
        if (!empty($nombre)) {
            $sql .= USER_NAME."='$nombre' ";
            $dataCount++;
        }

        if (!empty($apellidos)) {
            if ($dataCount > 0) {
                $sql .= ',';    
            }
            $sql .= USER_SURNAME."='$apellidos' ";
            $dataCount++;
        }

        if (!empty($email)) {
            if ($dataCount > 0) {
                $sql .= ',';    
            }
            $sql .= USER_EMAIL."='$email' ";
            $dataCount++;
        }

        if (!empty($password)) {
            if ($dataCount > 0) {
                $sql .= ',';    
            }
            $sql .= USER_PASSWORD."='$password' ";
        }

        $sql .= "WHERE ".USER_ID."=$id";
        // Execute the SQL Sentence
        $result = (mysqli_query($connection, $sql)) ? true : false;
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $result;
}

/**
 * Check if a user exist
 * @return true if exist
 * @return false if not
 */
function existUserWithEmail(String $email): bool {
    return (count(getUserByEmail($email)) > 0);
}

/**
 * Returns the user where the email are equals to the sended one.
 * @param String $email The unique email of the user
 * @return Array the represented user data as array
 */
function getUserByEmail(String $email): Array {
    $user = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $validEmail = mysqli_real_escape_string($connection, $email);
        
        //make SQL Sentence
        $sql = "SELECT * FROM USUARIOS WHERE ".USER_EMAIL."=\"$validEmail\"";
        
        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($data);

        //TODO useless step?
        if(isset($data[USER_ID])) {
            $user = [
                USER_ID => $data[USER_ID],
                USER_NAME => $data[USER_NAME],
                USER_SURNAME => $data[USER_SURNAME],
                USER_EMAIL => $data[USER_EMAIL],
                USER_PASSWORD => $data[USER_PASSWORD],
                USER_DATE => $data[USER_DATE]
            ];
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $user;
}

/**
 * Returns all users basic data.
 * 
 * This method should not be called for user data validation purposes.
 * for this purpose call getUserByEmail($email)
 * @param String $id The id of the user
 * @return Array the represented user data as array
 */
function getAllUsers(String $order = USER_ID, String $orderType = SQL_ORDER_ASC): Array {
    $users = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT ".USER_ID.", ".USER_NAME.", ".USER_SURNAME.", ".USER_EMAIL.", ".USER_DATE." FROM USUARIOS ORDER BY $order $orderType";
        
        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($data);
        
        foreach ($data as $value) {
            $user = [
                USER_ID => $value[0],
                USER_NAME => $value[1],
                USER_SURNAME => $value[2],
                USER_EMAIL => $value[3],
                USER_DATE => $value[4]
            ];
            array_push($users, $user);
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $users;
}

/**
 * Validate the given array preventing INSERTIONS with the given connection
 * @param MYSQLI $connection the sql connection with the db
 * @param Array $array the given array
 * @return Array the validated array
 */
function validateUser(mysqli $connection, Array $array): Array {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = mysqli_real_escape_string($connection, $value);
    }
    return $result;
}