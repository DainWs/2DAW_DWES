<?php
/**
 * Save the sended category data (represented by an Array) in the database
 * @param Array $category The category data represented as Array
 * @return true if was successfully saved
 * @return false if it can't be saved.
 */
function saveCategory(Array $category): bool {
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);
        $values = validateCategory($connection, $category);

        $nombre = $values[CATEGORY_NAME];

        //make INSERT SQL Sentence
        $sql = "INSERT INTO CATEGORIAS(".CATEGORY_NAME.") VALUES (\"$nombre\");";
        
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
 * Check if a category exist
 * @param int $id the id of the category
 * @return true if exist
 * @return false if not
 */
function existCategoryWithID(int $id): bool {
    return (count(getCategory($id)) > 0);
}

/**
 * Check if a category exist with the same name
 * @param int $name the name of the category
 * @return true if exist
 * @return false if not
 */
function existCategoryWithName(String $name): bool {
    return (count(getCategory(-1, $name)) > 0);
}

/**
 * Returns one category.
 * 
 * @param String $id The id of the category
 * @param String $name The name of the category
 * @return Array the represented category data as array
 */
function getCategory(int $id = -1, String $name = ""): Array {
    $category = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT * FROM CATEGORIAS";

        //If has select params then add WHERE sentence
        if (($id != -1) || (!empty($name))) {
            $sql .=  " WHERE ";

            if ($id != -1) {
                $sql .= CATEGORY_ID."=$id ";
            }
    
            if (!empty($name)) {
                $sql .= CATEGORY_NAME." LIKE '%$name%' ";
            }
        }

        $sql .= "LIMIT 1";
        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($data);

        $category = [
            CATEGORY_ID => $data[CATEGORY_ID],
            CATEGORY_NAME => $data[CATEGORY_NAME]
        ];
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $category;
}

function getAllCategories(): Array {
    $categories = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT * FROM CATEGORIAS";

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($data);
        foreach ($data as $value) {
            $categories[$value[0]] = $value[1];
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $categories;
}

/**
 * Validate the given array preventing INSERTIONS with the given connection
 * @param MYSQLI $connection the sql connection with the db
 * @param Array $array the given array
 * @return Array the validated array
 */
function validateCategory(mysqli $connection, Array $array): Array {
    $result = [];
    foreach ($array as $key => $value) {
        $result[$key] = mysqli_real_escape_string($connection, $value);
    }
    return $result;
}