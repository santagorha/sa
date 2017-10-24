<?php

class ControllerSession {

    public $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function login($data) {
        $response = array(
            'codeStatus' => UNAUTHORIZED, 
            'message' => 'unauthorized'
        );
        //ldap - active directory
        $ldap_dn = 'uid=' . $data['user'] . ',dc=' . DC_ONE . ',dc=' . DC_TWO;
        $ldap_pwd = $data['pwd'];
        $ldap_con = ldap_connect(HOST_LDAP);
        ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
        if(@ldap_bind($ldap_con, $ldap_dn, $ldap_pwd)) {
            //persistence
            //user
            $this->model->entity = 'usuario';
            $this->model->id = array('ID_USUARIO' => $data['user']);
            $dataUser = $this->model->get();
            if(empty($dataUser)) {
                $this->model->fields = array(
                    'ID_USUARIO', 
                    'NOMBRE_USUARIO', 
                    'NOMBRE1', 
                    'NOMBRE2', 
                    'APELLIDO1', 
                    'APELLIDO2', 
                    'CORREO', 
                    'FECHA_NACIMIENTO',
                    'SEXO', 
                    'CIUDAD', 
                    'FOTO', 
                    'TIPO_USUARIO'
                );
                $this->model->data = array(
                    $data['user'], 
                    $data['user'], 
                    '', 
                    '', 
                    '', 
                    '', 
                    '', 
                    date('Y-m-d'), 
                    '0', 
                    '1', 
                    '', 
                    '1'
                );
                if($this->model->post() === false) {
                    $response['codeStatus'] = INTERNAL_SERVER_ERROR;
                    $response['message'] = $this->model->error;
                    return $response;
                }
            }
            //session
            session_start();
            $phpSessId = session_id();
            $this->model->entity = 'sesion';
            $this->model->id = array('ID_SESION' => $phpSessId);
            $dataSesion = $this->model->get();
            if (empty($dataSesion)) {
                $this->model->fields = array(
                    'ID_SESION', 
                    'ID_USUARIO', 
                    'NOMBRE_USUARIO',
                    'DISPOSITIVO'
                );
                $this->model->data = array(
                    $phpSessId, 
                    $data['user'],
                    $data['user'],
                    ''
                );
                if($this->model->post() === false) {
                    $response['codeStatus'] = INTERNAL_SERVER_ERROR;
                    $response['message'] = $this->model->error;
                    return $response;
                }
            }
            $response['codeStatus'] = OK;
            $response['message'] = 'authorized';
        }
        return $response;
    }
    
    function logout() {
        session_start();
        $phpSessId = session_id();
        $this->model->entity = 'sesion';
        $this->model->id = array('ID_SESION' => $phpSessId);
        if($this->model->delete() === false) {
            $response['codeStatus'] = INTERNAL_SERVER_ERROR;
            $response['message'] = $this->model->error;
            return $response;
        }
        session_destroy();
        $response = array(
            'codeStatus' => OK, 
            'message' => 'closed session'
        );
        return $response;
    }
    
    function validateSession() {
        session_start();
        $phpSessId = session_id();
        $this->model->entity = 'sesion';
        $this->model->id = array('ID_SESION' => $phpSessId);
        $dataSesion = $this->model->get();
        if(empty($dataSesion)) {
            return array();
        } else {
            return $dataSesion;
        }
    }
}
