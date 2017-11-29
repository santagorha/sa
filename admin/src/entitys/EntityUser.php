<?php

namespace Entitys;

class EntityUser {

    private $id_usuario;
    private $nombre_usuario;
    private $nombre1;
    private $nombre2;
    private $apellido1;
    private $apellodo2;
    private $correo;
    private $fecha_nacimiento;
    private $sexo;
    private $ciudad;
    private $foto;
    private $tipo_usuario;

    function __construct(array $data) {
        $this->id_usuario = $data['ID_USUARIO'];
        $this->nombre_usuario = $data['NOMBRE_USUARIO'];
        $this->nombre1 = $data['NOMBRE1'];
        $this->nombre2 = $data['NOMBRE2'];
        $this->apellido1 = $data['APELLIDO1'];
        $this->apellodo2 = $data['APELLIDO2'];
        $this->correo = $data['CORREO'];
        $this->fecha_nacimiento = $data['FECHA_NACIMIENTO'];
        $this->sexo = $data['SEXO'];
        $this->ciudad = $data['CIUDAD'];
        $this->foto = $data['FOTO'];
        $this->tipo_usuario = $data['TIPO_USUARIO'];
    }

    function getId_usuario() {
        return $this->id_usuario;
    }

    function getNombre_usuario() {
        return $this->nombre_usuario;
    }

    function getNombre1() {
        return $this->nombre1;
    }

    function getNombre2() {
        return $this->nombre2;
    }

    function getApellido1() {
        return $this->apellido1;
    }

    function getApellodo2() {
        return $this->apellodo2;
    }

    function getCorreo() {
        return $this->correo;
    }

    function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getCiudad() {
        return $this->ciudad;
    }

    function getFoto() {
        return $this->foto;
    }

    function getTipo_usuario() {
        return $this->tipo_usuario;
    }

    function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    function setNombre_usuario($nombre_usuario) {
        $this->nombre_usuario = $nombre_usuario;
    }

    function setNombre1($nombre1) {
        $this->nombre1 = $nombre1;
    }

    function setNombre2($nombre2) {
        $this->nombre2 = $nombre2;
    }

    function setApellido1($apellido1) {
        $this->apellido1 = $apellido1;
    }

    function setApellodo2($apellodo2) {
        $this->apellodo2 = $apellodo2;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }

    function setFecha_nacimiento($fecha_nacimiento) {
        $this->fecha_nacimiento = $fecha_nacimiento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setCiudad($ciudad) {
        $this->ciudad = $ciudad;
    }

    function setFoto($foto) {
        $this->foto = $foto;
    }

    function setTipo_usuario($tipo_usuario) {
        $this->tipo_usuario = $tipo_usuario;
    }

}
