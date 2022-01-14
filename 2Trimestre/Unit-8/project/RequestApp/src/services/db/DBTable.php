<?php

use src\services\db\DBConnection;

abstract class DBTable extends DBConnection {
    
    /**
     * Only for internal use. (this method only used by this class)
     */
    protected function queryWhere($table, $field, $value, $toClass): array|false {
        $result = [];
        try {
            $statement = parent::$connection->prepare("SELECT * FROM $table WHERE $field = ?");
            $statement->bindParam(1, $value);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, $toClass);
        } catch(Exception $ex) {
            $this->errors = $ex->getMessage();
            $result = false;
        }
        return $result;
    }

    /**
     * Get all rows where match the conditions
     */
    public abstract function query(
        String $name = "",
        String $order = '',
        String $orderType = SQL_ORDER_ASC
    ): array|false;

    /**
     * Search a specified row where primary key is
     */
    public abstract function queryWith($id): array|false;

    /**
     * insert a row
     */
    public abstract function insert($rowData): bool;

    /**
     * updates a row
     */
    public abstract function update($rowData): bool;

    /**
     * Delete a row by a primary key
     */
    public abstract function delete($id): bool;

    /**
     * Delete where match the conditions
     */
    public abstract function deleteWhere($id): bool;
}