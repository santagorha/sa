<?php

class ControllerParams {

  public $model;

  public function __construct($model) {
    $this->model = $model;
  }

  function getFilters() {
    $this->model->entity = "FACULTAD";
    $facultades = $this->model->get();
    $this->model->entity = "CATEGORIA";
    $categorias = $this->model->get();
    $this->model->entity = "SEDE";
    $sedes = $this->model->get();
    $response = array(
      "codeStatus" => OK,
      "categorias" => $categorias,
      "facultades" => $facultades,
      "sedes" => $sedes
    );
    return $response;
  }
}
