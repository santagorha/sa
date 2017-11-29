<?php

namespace Controllers;

class ControllerCategory {
    
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }
    
    public function getCategorys() {
        $this->model->reset();
        $this->model->setEntity('categoria');
        $dataCategorys = $this->model->get();
        if (empty($dataCategorys)) {
            return null;
        } else {
            $categorys = array();
            for ($i = 0; $i < count($dataCategorys); $i++) {
                $categorys[] = new \Entitys\EntityCategory($dataCategorys[$i]);
            }
            return $categorys;
        }
    }
}
