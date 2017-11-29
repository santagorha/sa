<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityHeadquarters
 *
 * @author danielvelasquez
 */
class EntityHeadquarters {

    //put your code here
    private $id_sede;
    private $nombre_sede;
    private $direccion;
    private $id_ciudad;
    private $telefono;

    function __construct($data) {
        $this->id_sede = $data['ID_SEDE'];
        $this->nombre_sede = $data['NOMBRE_SEDE'];
        $this->direccion = $data['DIRECCION'];
        $this->id_ciudad = $data['ID_CIUDAD'];
        $this->telefono = $data['TELEFONO'];
    }

    function getId_sede() {
        return $this->id_sede;
    }

    function getNombre_sede() {
        return $this->nombre_sede;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId_sede($id_sede) {
        $this->id_sede = $id_sede;
    }

    function setNombre_sede($nombre_sede) {
        $this->nombre_sede = $nombre_sede;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setId_ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

}
