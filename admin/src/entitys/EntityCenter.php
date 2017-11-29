<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityCentro
 *
 * @author danielvelasquez
 */
class EntityCenter {

    //put your code here
    private $id_centro;
    private $nombre_centro;
    private $id_ciudad;
    private $id_sede;
    private $direccion;
    private $correo;
    private $telefono;

    function __construct($data) {
        $this->id_centro = $data['ID_CENTRO'];
        $this->nombre_centro = $data['NOMBRE_CENTRO'];
        $this->id_ciudad = $data['ID_CIUDAD'];
        $this->id_sede = $data['ID_SEDE'];
        $this->direccion = $data['DIRECCION'];
        $this->correo = $data['CORREO'];
        $this->telefono = $data['TELEFONO'];
    }

    function getId_centro() {
        return $this->id_centro;
    }

    function getNombre_centro() {
        return $this->nombre_centro;
    }

    function getId_ciudad() {
        return $this->id_ciudad;
    }

    function getId_sede() {
        return $this->id_sede;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setId_centro($id_centro) {
        $this->id_centro = $id_centro;
    }

    function setNombre_centro($nombre_centro) {
        $this->nombre_centro = $nombre_centro;
    }

    function setId_ciudad($id_ciudad) {
        $this->id_ciudad = $id_ciudad;
    }

    function setId_sede($id_sede) {
        $this->id_sede = $id_sede;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

}
