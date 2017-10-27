<?php

class ControllerUser {
    
    public $model;
    
    public function __construct($model) {
        $this->model = $model;
    }
    
    function user() {
        $controllerSession = new ControllerSession($this->model);
        $dataSession = $controllerSession->validateSession();
        if(empty($dataSession)) {
            $response = array(
                'codeStatus' => UNAUTHORIZED, 
                'message' => 'unauthorized'
            );
            return $response;
        }
        $this->model->entity = 'usuario';
        $this->model->id = array('ID_USUARIO' => $dataSession[0]['ID_USUARIO']);
        $dataUser = $this->model->get();
        $response = $dataUser[0];
        $response['codeStatus'] = OK;
        return $response;
    }
}

