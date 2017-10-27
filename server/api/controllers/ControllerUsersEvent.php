<?php
class ControllerUsersEvent {

  public $model;

  public function __construct($model) {
    $this->model = $model;
  }

  public function getUsersPerEvent($data) {
    $eventId = $data["evento"];

    $this->model->entity = "EVENTO_USUARIO NATURAL JOIN USUARIO";
    $this->model->id = array("ID_EVENTO" => $eventId,
    "MARCA_GUARDADO" => true);
    $result = $this->model->get();
    $response = array(
      "codeStatus" => OK,
      "message" => $result
    );
    return $response;
  }

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

  public function getUsuarioNuevo($data) {
    $userId = $data["usuario"];
    $eventId = $data["evento"];
    $response = array();

    $ds = ldap_connect(HOST_LDAP, PORT_LDAP);
    ldap_set_option ($ds, LDAP_OPT_REFERRALS, 0);
    ldap_set_option($ds, LDAP_OPT_PROTOCOL_VERSION, 3);
    if ($ds) {
      $r=ldap_bind($ds, LDAP_ADMIN, LDAP_ADMIN_PASS);
      $sr=ldap_search($ds, "dc=example,dc=com", "(uid={$usuario})");
      $info = ldap_get_entries($ds, $sr);
      if ($info["count"]) {
        $query = "SELECT get_add_user_event({$userId}, 'nombre', '', 'apellido', '', '1990/01/01', 1, 1, {$eventId})";
        $model = new Model();
        $result = $model->getQuery($query);
        $response = array(
          "codeStatus" => CREATED,
          "message" => $result
        );
        return $response;
      }
      else {
        $response = array(
          "codeStatus" => NOT_FOUND,
          "message" => "USUARIO NO ENCONTRADO"
        );
      }
      ldap_close($ds);
    } else {
      $response = array(
        "codeStatus" => INTERNAL_SERVER_ERROR
      );
    }

  }
}
