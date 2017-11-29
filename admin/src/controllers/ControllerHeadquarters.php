<?php

namespace Controllers;

class ControllerHeadquarters {
    
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function getHeadquarters() {
        $this->model->reset();
        $this->model->setEntity('sede');
        $dataHeadquarters = $this->model->get();
        if (empty($dataHeadquarters)) {
            return null;
        } else {
            $headquarters = array();
            for ($i = 0; $i < count($dataHeadquarters); $i++) {
                $headquarters[] = new \Entitys\EntityHeadquarters($dataHeadquarters[$i]);
            }
            return $headquarters;
        }
    }
}
