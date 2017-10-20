<?php
include 'core/config.php';

/* require the user as the parameter */
if(isset($_GET['eventos']) && intval($_GET['eventos'])) {

  /* soak in the passed variable or set our own */
  $eventos_id = $_GET['eventos']; //no default

  /* connect to the db */
  $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Cannot connect to the DB');

  /* grab the posts from the db */
  $query = "UPDATE EVENTO_USUARIO
  SET ASISTIDO = 1
  WHERE ID_EVENTO_USUARIO IN ($eventos_id)";
  $result = mysqli_query($link,$query) === TRUE;
  $rows_updated = mysqli_affected_rows($link);
  /* output in necessary format */
  header('Content-type: application/json');
  header("Access-Control-Allow-Origin: *");
  if($result){
    echo json_encode("$rows_updated");
  }else{
    echo json_encode(-1);
  }


  /* disconnect from the db */
  @mysqli_close($link);
}

?>
