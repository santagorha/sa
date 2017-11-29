<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityUserType
 *
 * @author danielvelasquez
 */
class EntityUserType {

    //put your code here
    private $id_tipo_usuario;
    private $tipo_usuario;

    function __construct($data) {
        $this->id_tipo_usuario = $data['ID_TIPO_USUARIO'];
        $this->tipo_usuario = $data['TIPO_USUARIO'];
    }

    function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

}
