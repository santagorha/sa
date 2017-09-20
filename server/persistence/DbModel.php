<?php

include 'config.php';

class DbModel {

    public $connection;
    public $isError;
    public $error;

    function __construct() {
        $this->isError = false;
        $this->connection = mysql_connect(HOST, USER, PASSWORD);
        if (!$this->connection) {
            $this->isError = true;
        }
        if(!mysql_select_db(DB, $this->connection)) {
            $this->isError = true;
            $this->error = mysql_error($this->connection);
        }
    }

    function getQuery($query, $type = 'assoc') {
        $result = mysql_query($query, $this->connection);
        if ($result === false) {
            $this->error = mysql_error($this->connection);
            return false;
        }
        $array = array();
        if(mysql_num_rows($result) > 0) {
            if($type === 'assoc') {
                while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    $array[] = $row;
                }
            }
        }
        return $array;
    }

    function setQuery($query) {
        $result = mysql_query($query, $this->connection);
        return $result;
    }
    
    function __destruct() {
        mysql_close($this->connection);
    }
}
