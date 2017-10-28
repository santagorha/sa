<?php
/*
	Clase de servicio que permite calcular los creditos del usuario 
*/
class ControllerUserCredits {

  public $model;
  public function __construct($model) {
    $this->model = $model;
  }

  /* consulta que resuelve el problema (despues la quito)
SELECT SUM(CREDITOS) AS TOTAL_CREDITOS FROM EVENTO 
NATURAL JOIN EVENTO_USUARIO
NATURAL JOIN USUARIO
WHERE NOMBRE_USUARIO = 'DEGUALTEROS' AND ASISTIDO = 1;

*/
public function getUserCredits($data) {
    $userId = $data["user"];
    $query = "SELECT SUM(CREDITOS) AS TOTAL_CREDITOS FROM EVENTO NATURAL JOIN EVENTO_USUARIO NATURAL JOIN USUARIO
				WHERE NOMBRE_USUARIO = ({$userId}) AND ASISTIDO = 1;
    $model = new Model();
    $result = $model->setQuery($query);
    $response = array(
      "codeStatus" => OK,
      "message" => $result      
    );
    return $response;
  };

}

