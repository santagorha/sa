<?php

namespace Entitys;

class EntityEvent {

    private $id_evento;
    private $nombre_evento;
    private $fecha;
    private $imagen;
    private $resumen;
    private $descripcion;
    private $categoria;
    private $sede;
    private $lugar;
    private $cupos;
    private $duracion_horas;
    private $facultad;
    private $creditos;
    private $fecha_programado;
    private $fecha_creado;
    private $marca_eliminado;
    private $fecha_eliminado;
    private $fecha_editado;

    public function __construct($data) {
        $this->id_evento = $data['ID_EVENTO'];
        $this->nombre_evento = $data['NOMBRE_EVENTO'];
        $this->fecha = $data['FECHA'];
        $this->imagen = $data['IMAGEN'];
        $this->resumen = $data['RESUMEN'];
        $this->descripcion = $data['DESCRIPCION'];
        $this->categoria = $data['CATEGORIA'];
        $this->sede = $data['SEDE'];
        $this->lugar = $data['LUGAR'];
        $this->cupos = $data['CUPOS'];
        $this->duracion_horas = $data['DURACION_HORAS'];
        $this->facultad = $data['FACULTAD'];
        $this->creditos = $data['CREDITOS'];
        $this->fecha_programado = $data['FECHA_PROGRAMADO'];
        $this->fecha_creado = $data['FECHA_CREADO'];
        $this->marca_eliminado = $data['MARCA_ELIMINADO'];
        $this->fecha_eliminado = $data['FECHA_ELIMINADO'];
        $this->fecha_editado = $data['FECHA_EDITADO'];
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function getNombre_evento() {
        return $this->nombre_evento;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function getResumen() {
        return $this->resumen;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getSede() {
        return $this->sede;
    }

    function getLugar() {
        return $this->lugar;
    }

    function getCupos() {
        return $this->cupos;
    }

    function getDuracion_horas() {
        return $this->duracion_horas;
    }

    function getFacultad() {
        return $this->facultad;
    }

    function getCreditos() {
        return $this->creditos;
    }

    function getFecha_programado() {
        return $this->fecha_programado;
    }

    function getFecha_creado() {
        return $this->fecha_creado;
    }

    function getMarca_eliminado() {
        return $this->marca_eliminado;
    }

    function getFecha_eliminado() {
        return $this->fecha_eliminado;
    }

    function getFecha_editado() {
        return $this->fecha_editado;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function setNombre_evento($nombre_evento) {
        $this->nombre_evento = $nombre_evento;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    function setResumen($resumen) {
        $this->resumen = $resumen;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setSede($sede) {
        $this->sede = $sede;
    }

    function setLugar($lugar) {
        $this->lugar = $lugar;
    }

    function setCupos($cupos) {
        $this->cupos = $cupos;
    }

    function setDuracion_horas($duracion_horas) {
        $this->duracion_horas = $duracion_horas;
    }

    function setFacultad($facultad) {
        $this->facultad = $facultad;
    }

    function setCreditos($creditos) {
        $this->creditos = $creditos;
    }

    function setFecha_programado($fecha_programado) {
        $this->fecha_programado = $fecha_programado;
    }

    function setFecha_creado($fecha_creado) {
        $this->fecha_creado = $fecha_creado;
    }

    function setMarca_eliminado($marca_eliminado) {
        $this->marca_eliminado = $marca_eliminado;
    }

    function setFecha_eliminado($fecha_eliminado) {
        $this->fecha_eliminado = $fecha_eliminado;
    }

    function setFecha_editado($fecha_editado) {
        $this->fecha_editado = $fecha_editado;
    }

}
