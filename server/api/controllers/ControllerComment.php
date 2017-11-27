<?php

class ControllerComment {

    public $model;

    public function __construct($model) {
        $this->model = $model;
    }

    function getComments($data) {
        /*$controllerSession = new ControllerSession($this->model);
        $dataSession = $controllerSession ->validateSession();
        if(empty($dataSession)){
            $response = array(
                'codeStatus' => UNAUTHORIZED,
                'message' => 'unauthorized'
            );
            return $response;
        }*/
        $this->model->entity = 'COMENTARIO';
        $this->model->id = array('ID_COMENTARIO' => $data['evento']);
        $response = $this->model->get();
        $response['codeStatus'] = OK;
        return $response;
        /*echo '<pre>';
        print_r($dataComment);
        echo '</pre>';*/
    }

    public function addComment($data) {
        $comentario = $data["evento"];
	      $sessionId = $data["session"];
	      $eventoId = $data["evento"];
        $model = new Model();

        $query = "INSERT INTO COMENTARIO(ID_USUARIO, ID_EVENTO, TEXTO, FECHA) SELECT ID_USUARIO, {$eventoId}, {$comentario}, SYSDATE() FROM SESION WHERE ID_SESION = {$sessionId}";
        $response = $model->setQuery($query);
        $response['codeStatus'] = OK;

    return $response;
  }
}
?>
