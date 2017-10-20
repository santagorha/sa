<?php
include 'core/config.php';

/* require the user as the parameter */
if(isset($_GET['evento']) && intval($_GET['evento'])) {

  /* soak in the passed variable or set our own */
  $evento_id = intval($_GET['evento']); //no default

  /* connect to the db */
  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Cannot connect to the DB');

  /* grab the posts from the db */
  $query = "SELECT u.NOMBRE_USUARIO nombre_usuario, eu.ID_EVENTO_USUARIO id_evento_usuario
  FROM USUARIO u NATURAL JOIN EVENTO_USUARIO eu WHERE eu.ID_EVENTO = $evento_id AND MARCA_GUARDADO";
  $result = mysqli_query($link,$query) or die('Errant query:  '.$query);

  /* create one master array of the records */
  $participantes = array();
  if(mysqli_num_rows($result)) {
    while($participante = mysqli_fetch_assoc($result)) {
      $participantes[] = array('participante'=>$participante);
    }
  }

  /* output in necessary format */
  header('Content-type: application/json');
  header("Access-Control-Allow-Origin: *");
  echo json_encode(array('participantes'=>$participantes));

  /* disconnect from the db */
  @mysqli_close($link);
}

?>
