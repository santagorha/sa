<?php

namespace Persistence;

class DbModel {

    private $connection;
    private $isError;
    private $error;
    private $host;
    private $user;
    private $pass;
    private $dbname;

    public function __construct($host, $user, $pass, $dbname) {
        $this->isError = false;
        $this->connection = mysqli_connect($host, $user, $pass, $dbname);
        if (!$this->connection) {
            $this->isError = true;
        }
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->dbname = $dbname;
    }

    function getConnection() {
        return $this->connection;
    }

    function getIsError() {
        return $this->isError;
    }

    function getError() {
        return $this->error;
    }

    function setConnection($connection) {
        $this->connection = $connection;
    }

    function setIsError($isError) {
        $this->isError = $isError;
    }

    function setError($error) {
        $this->error = $error;
    }

    public function getQuery($query, $type = 'assoc') {
        $result = mysqli_query($this->connection, $query);
        if ($result === false) {
            $this->error = mysqli_error($this->connection);
            return false;
        }
        $array = array();
        $numRows = mysqli_num_rows($result);
        if ($numRows > 0) {
            if ($type === 'assoc') {
                if($numRows === 1) {
                    return mysqli_fetch_assoc($result);
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    $array[] = $row;
                }
            }
        }
        return $array;
    }

    public function setQuery($query) {
        $result = mysqli_query($this->connection, $query);
        if ($result === false) {
            $this->error = mysqli_error($this->connection);
        }
        return $result;
    }

    public function __destruct() {
        mysqli_close($this->connection);
    }

}
