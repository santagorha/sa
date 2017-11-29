<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityCity
 *
 * @author danielvelasquez
 */
class EntityCity {

    //put your code here
    private $id_ciudad;
    private $nombre_ciudad;
    private $indicativo;

    function __construct($data) {
        $this->id_ciudad = $data['ID_CIUDAD'];
        $this->nombre_ciudad = $data['NOMBRE_CIUDAD'];
        $this->indicativo = $data['INDICATIVO'];
    }

    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getNombre_ciudad() {
        return $this->nombre_ciudad;
    }

    function getIndicativo() {
        return $this->indicativo;
    }

    function setId_ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setNombre_ciudad($nombre_ciudad) {
        $this->nombre_ciudad = $nombre_ciudad;
    }

    function setIndicativo($indicativo) {
        $this->indicativo = $indicativo;
    }

}
