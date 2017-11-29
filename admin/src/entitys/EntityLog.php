<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityLog
 *
 * @author danielvelasquez
 */
class EntityLog {

    //put your code here
    private $id_log;
    private $id_usuario;
    private $nombre_usuario;
    private $fecha;
    private $categoria;
    private $descripcion;

    function __construct($data) {
        $this->id_log = $data['ID_LOG'];
        $this->id_usuario = $data['ID_USUARIO'];
        $this->nombre_usuario = $data['NOMBRE_USUARIO'];
        $this->fecha = $data['FECHA'];
        $this->categoria = $data['CATEGORIA'];
        $this->descripcion = $data['DESCRIPCION'];
    }

    function getId_log() {
        return $this->id_log;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId_log($id_log) {
        $this->id_log = $id_log;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

}
