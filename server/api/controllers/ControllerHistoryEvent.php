<?php

class ControllerHistoryEvent {
  public $model;
  public function __construct($model) {
    $this->model = $model;
  }

  public function getHistoryEvent($data) {
    $userId = $data["user"];
    $this->model->entity = "EVENTO NATURAL JOIN EVENTO_USUARIO NATURAL JOIN USUARIO";
    $this->model->id = array("ID_USUARIO" => $userId,
    "MARCA_GUARDADO" => true);
    $event = $this->model->get();
    $response = array(
      "codeStatus" => OK,
      "message" => $event
    );
    return $response;
  }
  /* por si la consulta no funciona y la quiero hacer diferente
  public function setAsistencia($data) {
    $eventIds = $data["eventos"];
    $query = "UPDATE EVENTO_USUARIO SET ASISTIDO = TRUE WHERE ID_EVENTO_USUARIO IN ({$eventIds})";
    $model = new Model();
    $result = $model->setQuery($query);
    $response = array(
      "codeStatus" => OK,
      "message" => $result      
    );
    return $response;
  }
*/
}