<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityCommentary
 *
 * @author danielvelasquez
 */
class EntityCommentary {

    //put your code here
    private $id_comentario;
    private $id_usuario;
    private $id_evento;
    private $texto;
    private $fecha;

    function __construct($data) {
        $this->id_comentario = $data['ID_COMENTARIO'];
        $this->id_usuario = $data['ID_USUARIO'];
        $this->id_evento = $data['ID_EVENTO'];
        $this->texto = $data['TEXTO'];
        $this->fecha = $data['FECHA'];
    }

    function getId_comentario() {
        return $this->id_comentario;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getTexto() {
        return $this->texto;
    }

    function getFecha() {
        return $this->fecha;
    }

    function setId_comentario($id_comentario) {
        $this->id_comentario = $id_comentario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setTexto($texto) {
        $this->texto = $texto;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

}
