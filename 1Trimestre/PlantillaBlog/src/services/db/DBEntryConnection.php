<?php
/**
 * Save the sended entry data (represented by an Array) in the database
 * @param Array $entry The entry data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function saveCategory(Array $entry): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $values = validateEntry($connection, $entry);

        $nombre = $values[ENTRY_ID];

        //make INSERT SQL Sentence
        $sql = "INSERT INTO ENTRADAS(".ENTRY_ID.") VALUES (\"$nombre\");";
        
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
function existCategoryWithID(int $id): bool {
    return (count(getCategoryByID($id)) > 0);
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
        $sql = "SELECT * FROM ENTRADAS WHERE ".ENTRY_ID."=$id";
        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($data);

        $entry = [
            ENTRY_ID => $data[ENTRY_ID],
            ENTRY_ID => $data[ENTRY_ID]
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

function getAllEntries(): Array {
    $entries = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT * FROM ENTRADAS";

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($data);
        foreach ($data as $value) {
            $entries[$value[0]] = $value[1];
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