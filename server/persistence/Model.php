<?php

include 'DbModel.php';

class Model extends DbModel {

    public $entity;
    public $id;
    public $fields;
    public $data;

    function __construct() {
        parent::__construct();
        $this->id = array();
    }

    function get() {
        if (empty($this->id)) {
            return $this->getQuery('SELECT * FROM ' . $this->entity);
        } else {
            $query = 'SELECT * FROM ' . $this->entity .
                    ' WHERE';
            $keys = array_keys($this->id);
            $values = array_values($this->id);
            $keysLength = count($keys);
            for ($i = 0; $i < $keysLength; $i++) {
                $query .= ' ' . $keys[$i] . ' = \'' . $values[$i] . '\'';
                if ($keysLength - 1 !== $i) {
                    $query .= ' AND';
                } else {
                    $query .= ';';
                }
            }
            return $this->getQuery($query);
        }
    }

    function post() {
        $query = 'INSERT INTO ' . $this->entity . '(' .
                implode(',', $this->fields) . ') VALUES (';
        $dataLength = count($this->data);
        for ($i = 0; $i < $dataLength; $i++) {
            $query .= '\'' . $this->data[$i] . '\'';
            if ($dataLength - 1 !== $i) {
                $query .= ',';
            }
        }
        $query .= ');';
        return $this->setQuery($query);
    }

    function put() {
        $query = 'UPDATE ' . $this->entity . ' SET ';
        $fieldsLength = count($this->fields);
        for ($i = 0; $i < $fieldsLength; $i++) {
            $query .= $this->fields[$i] . ' = \'' . $this->data[$i] . '\'';
            if ($fieldsLength - 1 !== $i) {
                $query .= ',';
            }
        }
        $query .= ' WHERE';
        $keys = array_keys($this->id);
        $values = array_values($this->id);
        $keysLength = count($keys);
        for ($i = 0; $i < $keysLength; $i++) {
            $query .= ' ' . $keys[$i] . ' = \'' . $values[$i] . '\'';
            if ($keysLength - 1 !== $i) {
                $query .= ' AND';
            } else {
                $query .= ';';
            }
        }
        return $this->setQuery($query);
    }

    function delete() {
        $query = 'DELETE FROM ' . $this->entity .
                ' WHERE';
        $keys = array_keys($this->id);
        $values = array_values($this->id);
        $keysLength = count($keys);
        for ($i = 0; $i < $keysLength; $i++) {
            $query .= ' ' . $keys[$i] . ' = \'' . $values[$i] . '\'';
            if ($keysLength - 1 !== $i) {
                $query .= ' AND';
            } else {
                $query .= ';';
            }
        }
        return $this->setQuery($query);
    }

}
