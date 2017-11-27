<?php

class DbModel {

    public $connection;
    public $isError;
    public $error;

    function __construct() {
        $this->isError = false;
        $this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_NAME);
        if (!$this->connection) {
            $this->isError = true;
        }
    }

    function getQuery($query, $type = 'assoc') {
        $result = mysqli_query($this->connection, $query);
        if ($result === false) {
            $this->error = mysqli_error($this->connection);
            return false;
        }
        $array = array();
        if(mysqli_num_rows($result) > 0) {
            if($type === 'assoc') {
                while($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
            }
        }
        return $array;
    }

    function setQuery($query) {
        $result = mysqli_query($this->connection, $query);
        if($result === false) {
            $this->error = mysqli_error($this->connection);
        }
        return $result;
    }
    
    function __destruct() {
        mysqli_close($this->connection);
    }
}
