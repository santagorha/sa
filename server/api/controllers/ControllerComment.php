<?php

class ControllerComment {

  public $model;

  public function __construct($model) {
    $this->model = $model;
  }

  function getComments($data) {
    $this->model->entity = "COMENTARIO NATURAL JOIN EVENTO";
    $this->model->id = array("ID_EVENTO" => $data["evento"]);
    $result = $this->model->get();
    $response = array(
      "codeStatus" => OK,
      "comentarios" => $result
    );
    return $response;
  }

  public function addComment($data) {
    $comentario = $data["evento"];
    $sessionId = $data["session"];
    $eventoId = $data["evento"];
    $model = new Model();

    $query = "INSERT INTO COMENTARIO(ID_USUARIO, ID_EVENTO, TEXTO, FECHA) SELECT ID_USUARIO, {$eventoId}, {$comentario} FROM SESION WHERE ID_SESION = {$sessionId}";
    $response = $model->setQuery($query);

    return $response;
  }
}
