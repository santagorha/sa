<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityNotification
 *
 * @author danielvelasquez
 */
class EntityNotification {

    //put your code here
    private $id_notificacion;
    private $id_usuario;
    private $titulo;
    private $mensaje;

    function __construct($data) {
        $this->id_notificacion = $data['ID_NOTIFICACION'];
        $this->id_usuario = $data['ID_USUARIO'];
        $this->titulo = $data['TITULO'];
        $this->mensaje = $data['MENSAJE'];
    }

    function getId_notificacion() {
        return $this->id_notificacion;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getMensaje() {
        return $this->mensaje;
    }

    function setId_notificacion($id_notificacion) {
        $this->id_notificacion = $id_notificacion;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

}
