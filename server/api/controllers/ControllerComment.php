<?php

class ControllerComment {
    
    public $model;
    
    public function __construct($model) {
        $this->model = $model;
    }
    
    function comment($data) {
        /*$controllerSession = new ControllerSession($this->model);
        $dataSession = $controllerSession ->validateSession();
        if(empty($dataSession)){
            $response = array(
                'codeStatus' => UNAUTHORIZED, 
                'message' => 'unauthorized'
            );
            return $response;
        }*/
        $this->model->entity = 'comentario';
        $this->model->id = array('ID_COMENTARIO' => $data['evento']);
        $dataComment = $this->model->get();
        $response = $dataComment;
        $response['codeStatus'] = OK;
        return $response;
        /*echo '<pre>';
        print_r($dataComment);
        echo '</pre>';*/
    }
}
?>

