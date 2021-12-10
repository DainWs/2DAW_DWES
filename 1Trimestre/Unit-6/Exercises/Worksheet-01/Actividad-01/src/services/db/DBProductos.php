<?php
require_once('../src/config/constants.php');

function getAllProducts(): Array {
    $products = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT * FROM PRODUCTO";

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($data);
        foreach ($data as $value) {
            $result = [
                'cod' => $value[0],
                'nombre' => $value[1],
                'nombre_corto' => $value[2],
                'descripcion' => $value[3],
                'PVP' => $value[4],
                'familia' => $value[5],
            ];
            $products[$value[0]] = $result;
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $products;
}

function getProductStock($id) {
    $stocks = [];
    try {
        //Open the connection
        $connection = mysqli_connect(DB_DOMAIN, DB_USER, DB_PASSWORD, DB_NAME);

        //make SQL Sentence
        $sql = "SELECT * FROM STOCK WHERE PRODUCTO = '$id'";

        // Execute the SQL Sentence
        $data = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($data);
        foreach ($data as $value) {
            $result = [
                'producto' => $value[0],
                'tienda' => $value[1],
                'unidades' => $value[2]
            ];
            $stocks[$value[0] . '-' . $value[1]] = $result;
        }
    }
    catch(Exception $ex) {}
    finally {
        //Close the connection
        if(isset($connection)) {
            $connection->close();
        }
    }
    return $stocks;
}