<?php

namespace Entitys;

class EntityCategory {

    private $id_categoria;
    private $nombre_categoria;

    function __construct($data) {
        $this->id_categoria = $data['ID_CATEGORIA'];
        $this->nombre_categoria = $data['NOMBRE_CATEGORIA'];
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getNombre_categoria() {
        return $this->nombre_categoria;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $nombre_categoria;
    }

}
