<?php
class ControllerEvent {

  public $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function getEvents($data) {

    $seccion = $data["seccion"];
    $lugarId = $data["lugar"];
    $horaInicial = $data["horaInicial"];
    $horaFinal = $data["horaFinal"];
    $fechaInicial = $data["fechaInicial"];
    $fechaFinal = $data["fechaFinal"];
    $categoriaId = $data["categoria"];
    $facultadId = $data["facultad"];
    #falta sesion para guardados y favoritos
    $query = "";
    switch ($seccion) {
      case 1:
      # en caso de ser guardado
      $query = $query;
      break;
      case 2:
      # en caso de ser favorito
      $query = $query;
      break;
      default:
      # en caso de página inicial
      $query = "SELECT * FROM CATEGORIA NATURAL JOIN EVENTO NATURAL JOIN FACULTAD WHERE MARCA_ELIMINADO = FALSE";
      if (!empty($lugarId)) {
        #en caso de haber lugar
      }
      if (!empty($horaInicial) && !empty($horaFinal) && !empty($fechaInicial) && !empty($fechaFinal)) {
        #FORMATO FECHA
        $query += " AND (FECHA_PROGRAMADO BETWEEN '{$horaInicial}' AND '{$horaFinal}' AND HOUR(FECHA_PROGRAMADO) BETWEEN {$horaInicial} AND {$horaFinal})";
      }
      if (!empty($categoriaId)) {
        $query += " AND CATEGORIA_ID = {$categoriaId}";
      }
      if (!empty($facultadId)) {
        $query += " AND FACULTAD_ID = {$facultadId}";
      }
      break;
    }

    $model = new Model();
    $result = $model->getQuery($query);

    $response = array(
      "codeStatus" => OK,
      "eventos" => $result
    );
    return $response;
  }

  public function getEvent($data) {

    $eventId = $data["evento"];
    #falta sesion para guardados y favoritos
    $this->model->entity = "CATEGORIA NATURAL JOIN EVENTO NATURAL JOIN FACULTAD";
    $this->model->id = array("ID_EVENTO" => $eventId);
    $result = $this->model->get();

    $response = array(
      "codeStatus" => OK,
      "eventos" => $result
    );
    return $response;
  }


}
