<?php
/**
 * Save the sended entry data (represented by an Array) in the database
 * @param Array $entry The entry data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function saveEntry(Array $entry): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $values = validateEntry($connection, $entry);

        $idUsuario = $values[ENTRY_USER_ID];
        $idCategoria = $values[ENTRY_CATEGORY_ID];
        $title = $values[ENTRY_TITLE];
        $description = $values[ENTRY_DESCRIPTION];
        $date = $values[ENTRY_DATE] ?? date('Y-m-d H:i:s');

        //make INSERT SQL Sentence
        $sql = "INSERT INTO ENTRADAS(".ENTRY_USER_ID.", ".ENTRY_CATEGORY_ID.", ".ENTRY_TITLE.", ".ENTRY_DESCRIPTION.", ".ENTRY_DATE.") ".
                "VALUES ($idUsuario, $idCategoria, '$title', '$description', '$date')";
        
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
 * Update the sended entry data (represented by an Array) in the database
 * @param Array $entry The entry data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function updateEntry(Array $entry): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $values = validateEntry($connection, $entry);

        $id = $values[ENTRY_ID];
        $idUsuario = $values[ENTRY_USER_ID];
        $idCategoria = $values[ENTRY_CATEGORY_ID];
        $title = $values[ENTRY_TITLE];
        $description = $values[ENTRY_DESCRIPTION];
        $date = $values[ENTRY_DATE] ?? date('Y-m-d H:i:s');

        //make UPDATE SQL Sentence
        $sql = "UPDATE ENTRADAS SET ".ENTRY_ID."=$id, ". ENTRY_USER_ID ."=$idUsuario, ". ENTRY_CATEGORY_ID ."=$idCategoria, "
                . ENTRY_TITLE ."='$title', ".ENTRY_DESCRIPTION."='$description', ".ENTRY_DATE."='$date' WHERE ".ENTRY_ID."=$id";

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

function deleteEntry($id): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $validId = mysqli_real_escape_string($connection, $id);

        //make INSERT SQL Sentence
        $sql = "DELETE FROM ENTRADAS WHERE ".ENTRY_ID."=$validId";
        
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
 * Check if a entry exist
 * @param int $id the id of the entry
 * @return true if exist
 * @return false if not
 */
function existEntryWithID(int $id): bool {
    return (count(getEntryByID($id)) > 0);
}

/**
 * Returns the entry where the id are equals to the sended one.
 * 
 * This method should not be called for entry data validation purposes.
 * for this purpose call getCategoryByEmail($email)
 * @param String $id The id of the entry
 * @return Array the represented entry data as array
 */
function getEntryByID(int $id): Array {
    $entry = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT E.".ENTRY_ID.', E.'.ENTRY_USER_ID.', U.'.USER_NAME.' AS '.ENTRY_USER_NAME.', E.'.ENTRY_CATEGORY_ID.', C.'.CATEGORY_NAME.' AS '.ENTRY_CATEGORY_NAME.', E.'.ENTRY_TITLE.', E.'.ENTRY_DESCRIPTION.', E.'.ENTRY_DATE. 
                " FROM ENTRADAS E" . 
                " LEFT OUTER JOIN USUARIOS U ON E.".ENTRY_USER_ID."=U.". USER_ID . 
                " LEFT OUTER JOIN CATEGORIAS C ON E.".ENTRY_CATEGORY_ID."=C.".CATEGORY_ID . 
                " WHERE E.".ENTRY_ID."=$id";

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($data);

        $entry = [
            ENTRY_ID => $data[ENTRY_ID],
            ENTRY_USER_ID => $data[ENTRY_USER_ID],
            ENTRY_USER_NAME => $data[ENTRY_USER_NAME],
            ENTRY_CATEGORY_ID => $data[ENTRY_CATEGORY_ID],
            ENTRY_CATEGORY_NAME => $data[ENTRY_CATEGORY_NAME],
            ENTRY_TITLE => $data[ENTRY_TITLE],
            ENTRY_DESCRIPTION => $data[ENTRY_DESCRIPTION],
            ENTRY_DATE => $data[ENTRY_DATE]
        ];
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $entry;
}

/**
 * Return all entries with the specified User id the table
 * @param int $idUser the specified user id
 * @param int $idCategory the specified category id
 * @return Array of table entries
 */
function getAllEntries(String $entryName = "", int $idUser = -1, int $idCategoria = -1): Array {
    $entries = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $validName = mysqli_real_escape_string($connection, $entryName);
        $validUser = mysqli_real_escape_string($connection, $idUser);
        $validCategory = mysqli_real_escape_string($connection, $idCategoria);


        //make SQL Sentence
        $sql = "SELECT E.".ENTRY_ID.', E.'.ENTRY_USER_ID.', U.'.USER_NAME.' AS '.ENTRY_USER_NAME.', E.'.ENTRY_CATEGORY_ID.', C.'.CATEGORY_NAME.' AS '.ENTRY_CATEGORY_NAME.', E.'.ENTRY_TITLE.', E.'.ENTRY_DESCRIPTION.', E.'.ENTRY_DATE. 
                " FROM ENTRADAS E" . 
                " LEFT OUTER JOIN USUARIOS U ON E.".ENTRY_USER_ID."=U.". USER_ID . 
                " LEFT OUTER JOIN CATEGORIAS C ON E.".ENTRY_CATEGORY_ID."=C.".CATEGORY_ID;

        if (!empty($validName) || ($idUser >= 0) || ($idCategoria >= 0)) {
            $sql .= ' WHERE';
        }

        if (!empty($validName)) {
            $sql .= ' E.'.ENTRY_TITLE." LIKE \"%$validName%\"";
        }

        if ($validUser >= 0) {
            $sql .= ' E.'.ENTRY_USER_ID."=$validUser";
        }

        if ($validCategory >= 0) {
            $sql .= ' E.'.ENTRY_CATEGORY_ID."=$validCategory";
        }

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);

        $data = mysqli_fetch_all($data);
        foreach ($data as $value) {
            $entry = [
                ENTRY_ID => $value[0],
                ENTRY_USER_ID => $value[1],
                ENTRY_USER_NAME => $value[2],
                ENTRY_CATEGORY_ID => $value[3],
                ENTRY_CATEGORY_NAME => $value[4],
                ENTRY_TITLE => $value[5],
                ENTRY_DESCRIPTION => $value[6],
                ENTRY_DATE => $value[7]
            ];
            $entries[$value[0]] = $entry;
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $entries;
}

/**
 * Validate the given array preventing INSERTIONS with the given connection
 * @param MYSQLI $connection the sql connection with the db
 * @param Array $array the given array
 * @return Array the validated array
 */
function validateEntry(mysqli $connection, Array $array): Array {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = mysqli_real_escape_string($connection, $value);
    }
    return $result;
}