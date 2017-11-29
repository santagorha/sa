<?php

namespace Entitys;

class EntitySession {

    private $id_sesion;
    private $id_usuario;
    private $nombre_usuario;
    private $dispositivo;

    public function __construct($data) {
        $this->id_sesion = $data['ID_SESION'];
        $this->id_usuario = $data['ID_USUARIO'];
        $this->nombre_usuario = $data['NOMBRE_USUARIO'];
        $this->dispositivo = $data['DISPOSITIVO'];
    }

    function getId_sesion() {
        return $this->id_sesion;
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getDispositivo() {
        return $this->dispositivo;
    }

    function setId_sesion($id_sesion) {
        $this->id_sesion = $id_sesion;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setDispositivo($dispositivo) {
        $this->dispositivo = $dispositivo;
    }

}
