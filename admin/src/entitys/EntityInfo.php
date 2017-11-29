<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Entitys;

/**
 * Description of EntityInfo
 *
 * @author danielvelasquez
 */
class EntityInfo {

    //put your code here
    private $id_info;
    private $version;
    private $last_modify;
    private $about;

    function __construct($data) {
        $this->id_info = $data['ID_INFO'];
        $this->version = $data['VERSION'];
        $this->last_modify = $data['LAST_MODIFY'];
        $this->about = $data['ABOUT'];
    }

    function getId_info() {
        return $this->id_info;
    }

    function getVersion() {
        return $this->version;
    }

    function getLast_modify() {
        return $this->last_modify;
    }

    function getAbout() {
        return $this->about;
    }

    function setId_info($id_info) {
        $this->id_info = $id_info;
    }

    function setVersion($version) {
        $this->version = $version;
    }

    function setLast_modify($last_modify) {
        $this->last_modify = $last_modify;
    }

    function setAbout($about) {
        $this->about = $about;
    }

}
