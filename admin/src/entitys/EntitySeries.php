<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntitySeries
 *
 * @author danielvelasquez
 */
class EntitySeries {

    //put your code here
    private $id_serie;
    private $id_evento;

    function __construct($data) {
        $this->id_serie = $data['ID_SERIE'];
        $this->id_evento = $data['ID_EVENTO'];
    }

    function getId_serie() {
        return $this->id_serie;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function setId_serie($id_serie) {
        $this->id_serie = $id_serie;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

}
