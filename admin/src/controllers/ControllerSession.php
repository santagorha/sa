<?php

namespace Controllers;

class ControllerSession {

    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    public function getSessionById_sesion($id_sesion) {
        $this->model->reset();
        $this->model->setEntity('sesion');
        $this->model->setId(['ID_SESION' => $id_sesion]);
        $dataSession = $this->model->get();
        if (empty($dataSession)) {
            return null;
        } else {
            return new \Entitys\EntitySession($dataSession);
        }
    }

    public function login($data = ['user' => '', 'pass' => '']) {
        $this->model->reset();
        session_start();
        $phpSessId = session_id();
        $this->model->setEntity('sesion');
        $this->model->setId(['ID_SESION' => $phpSessId]);
        $dataSession = $this->model->get();
        $session = null;
        $user = null;
        $this->model->reset();
        $controllerUser = new \Controllers\ControllerUser($this->model);
        if (!empty($dataSession)) {
            $session = new \Entitys\EntitySession($dataSession);
            $user = $controllerUser->getUserByNombre_usuario($session->getNombre_usuario());
            return [$session, $user];
        } else {
            //ldap - active directory
            $ldap_dn = 'uid=' . $data['user'] . ',dc=' . DC_ONE . ',dc=' . DC_TWO;
            $ldap_pwd = $data['pass'];
            $ldap_con = ldap_connect(HOST_LDAP);
            ldap_set_option($ldap_con, LDAP_OPT_PROTOCOL_VERSION, 3);
            if (@ldap_bind($ldap_con, $ldap_dn, $ldap_pwd)) {
                //persistence
                $this->model->reset();
                //user
                $user = $controllerUser->getUserByNombre_usuario($data['user']);
                if (is_null($user)) {
                    $this->model->reset();
                    $this->model->setEntity('usuario');
                    $this->model->setFields([
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
                    ]);
                    $this->model->setData([
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
                    ]);
                    if ($this->model->post() === false) {
                        return [];
                    }
                    $this->model->reset();
                    $user = $controllerUser->getUserByNombre_usuario($data['user']);
                    if (is_null($user)) {
                        return [];
                    }
                }
                //session
                $this->model->reset();
                $this->model->setEntity('sesion');
                $this->model->setFields([
                    'ID_SESION',
                    'ID_USUARIO',
                    'NOMBRE_USUARIO',
                    'DISPOSITIVO'
                ]);
                $this->model->setData([
                    $phpSessId,
                    $user->getId_usuario(),
                    $user->getNombre_usuario(),
                    ''
                ]);
                if ($this->model->post() === false) {
                    return [];
                }
                $session = $this->getSessionById_sesion($phpSessId);
                if (is_null($session)) {
                    return [];
                }
            }
        }
        if (is_null($session)) {
            return [];
        }
        return [$session, $user];
    }

    public function logout() {
        $this->model->reset();
        $phpSessId = session_id();
        $this->model->setEntity('sesion');
        $this->model->setId(['ID_SESION' => $phpSessId]);
        if ($this->model->delete() === false) {
            return false;
        }
        session_destroy();
        return true;
    }

}
