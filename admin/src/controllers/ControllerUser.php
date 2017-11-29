<?php

namespace Controllers;

class ControllerUser {

    public $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getUserByNombre_usuario($nombre_usuario) {
        $this->model->setEntity('usuario');
        $this->model->setTerms(['NOMBRE_USUARIO' => $nombre_usuario]);
        $dataUser = $this->model->get();
        if (empty($dataUser)) {
            return null;
        } else {
            return new \Entitys\EntityUser($dataUser);
        }
    }

}
