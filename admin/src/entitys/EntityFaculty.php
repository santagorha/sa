<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityFaculty
 *
 * @author danielvelasquez
 */
class EntityFaculty {

    //put your code here
    private $id_facultad;
    private $nombre_facultad;

    function __construct($data) {
        $this->id_facultad = $data['ID_FACULTAD'];
        $this->nombre_facultad = $data['NOMBRE_FACULTAD'];
    }

    function getId_facultad() {
        return $this->id_facultad;
    }

    function getNombre_facultad() {
        return $this->nombre_facultad;
    }

    function setId_facultad($id_facultad) {
        $this->id_facultad = $id_facultad;
    }

    function setNombre_facultad($nombre_facultad) {
        $this->nombre_facultad = $nombre_facultad;
    }

}
