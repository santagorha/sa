<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityUserEvent
 *
 * @author danielvelasquez
 */
class EntityUserEvent {

    //put your code here
    private $id_evento_usuario;
    private $id_usuario;
    private $id_evento;
    private $asistido;
    private $rol_evento;
    private $marca_guardado;
    private $marca_favorito;
    private $marca_evento_eliminado_usuario;
    private $fecha_evento_eliminado_usuario;

    function __construct($data) {
        $this->id_evento_usuario = $data['ID_EVENTO_USUARIO'];
        $this->id_usuario = $data['ID_USUARIO'];
        $this->id_evento = $data['ID_EVENTO'];
        $this->asistido = $data['ASISTIDO'];
        $this->rol_evento = $data['ROL_EVENTO'];
        $this->marca_guardado = $data['MARCA_GUARDADO'];
        $this->marca_favorito = $data['MARCA_FAVORITO'];
        $this->marca_evento_eliminado_usuario = $data['MARCA_EVENTO_ELIMINADO_USUARIO'];
        $this->fecha_evento_eliminado_usuario = $data['FECHA_EVENTO_ELIMINADO_USUARIO'];
    }

    function getId_evento_usuario() {
        return $this->id_evento_usuario;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getAsistido() {
        return $this->asistido;
    }

    function getRol_evento() {
        return $this->rol_evento;
    }

    function getMarca_guardado() {
        return $this->marca_guardado;
    }

    function getMarca_favorito() {
        return $this->marca_favorito;
    }

    function getMarca_evento_eliminado_usuario() {
        return $this->marca_evento_eliminado_usuario;
    }

    function getFecha_evento_eliminado_usuario() {
        return $this->fecha_evento_eliminado_usuario;
    }

    function setId_evento_usuario($id_evento_usuario) {
        $this->id_evento_usuario = $id_evento_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setAsistido($asistido) {
        $this->asistido = $asistido;
    }

    function setRol_evento($rol_evento) {
        $this->rol_evento = $rol_evento;
    }

    function setMarca_guardado($marca_guardado) {
        $this->marca_guardado = $marca_guardado;
    }

    function setMarca_favorito($marca_favorito) {
        $this->marca_favorito = $marca_favorito;
    }

    function setMarca_evento_eliminado_usuario($marca_evento_eliminado_usuario) {
        $this->marca_evento_eliminado_usuario = $marca_evento_eliminado_usuario;
    }

    function setFecha_evento_eliminado_usuario($fecha_evento_eliminado_usuario) {
        $this->fecha_evento_eliminado_usuario = $fecha_evento_eliminado_usuario;
    }

}
