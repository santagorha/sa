<?php

namespace Persistence;

class Model extends DbModel {

    private $entity;
    private $id;
    private $fields;
    private $data;
    private $terms;

    public function __construct($host, $user, $pass, $dbname) {
        parent::__construct($host, $user, $pass, $dbname);
        $this->id = array();
    }

    function getEntity() {
        return $this->entity;
    }

    function getId() {
        return $this->id;
    }

    function getFields() {
        return $this->fields;
    }

    function getData() {
        return $this->data;
    }

    function getTerms() {
        return $this->terms;
    }

    function setEntity($entity) {
        $this->entity = $entity;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFields($fields) {
        $this->fields = $fields;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setTerms($terms) {
        $this->terms = $terms;
    }

    public function get() {
        if (empty($this->id)) {
            $query = 'SELECT * FROM ' . $this->entity;
            if (empty($this->terms)) {
                $query .= ';';
            } else {
                //terms
                $query .= ' WHERE ' . $this->setToQueryKeysValues($this->terms, true);
            }
        } else {
            $query = 'SELECT * FROM ' . $this->entity . ' WHERE';
            //id
            if (empty($this->terms)) {
                $query .= $this->setToQueryKeysValues($this->id, true);
            } else {
                $query .= $this->setToQueryKeysValues($this->id);
                $query .= $this->setToQueryKeysValues($this->terms, true);
            }
        }
        return $this->getQuery($query);
    }

    public function post() {
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

    public function put() {
        $query = 'UPDATE ' . $this->entity . ' SET ';
        $fieldsLength = count($this->fields);
        for ($i = 0; $i < $fieldsLength; $i++) {
            $query .= $this->fields[$i] . ' = \'' . $this->data[$i] . '\'';
            if ($fieldsLength - 1 !== $i) {
                $query .= ',';
            }
        }
        $query .= ' WHERE';
        //id
        if (empty($this->terms)) {
            $query .= $this->setToQueryKeysValues($this->id, true);
        } else {
            $query .= $this->setToQueryKeysValues($this->id);
            $query .= $this->setToQueryKeysValues($this->terms, true);
        }
        return $this->setQuery($query);
    }

    public function delete() {
        $query = 'DELETE FROM ' . $this->entity .
                ' WHERE';
        if (empty($this->terms)) {
            $query .= $this->setToQueryKeysValues($this->id, true);
        } else {
            $query .= $this->setToQueryKeysValues($this->id);
            $query .= $this->setToQueryKeysValues($this->terms, true);
        }
        return $this->setQuery($query);
    }

    public function reset() {
        $this->entity = '';
        $this->id = array();
        $this->fields = array();
        $this->data = array();
        $this->terms = array();
    }

    private function setToQueryKeysValues($keysValues, $finalize = false) {
        $queryPart = '';
        $keys = array_keys($keysValues);
        $values = array_values($keysValues);
        $keysLength = count($keys);
        for ($i = 0; $i < $keysLength; $i++) {
            $queryPart .= ' ' . $keys[$i] . ' = \'' . $values[$i] . '\'';
            if ($keysLength - 1 !== $i) {
                $queryPart .= ' AND';
            } else {
                if ($finalize) {
                    $queryPart .= ';';
                }
            }
        }
        return $queryPart;
    }

}
