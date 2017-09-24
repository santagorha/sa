<?php

/* header is a utiliti to send us a json format  */

header('Content-Type: application/json');

/* require is a option to bring us a conexion file and execut in this file  */
require 'conexion.php';



/* the variable usuarios just  keeps the information of cbd conection */


$usuarios = $mysqli->query("SELECT usuario, pass FROM login WHERE usuario = '".$_POST['usuario']. "' AND  pass = '".$_POST['pass']."'");

/*this if just conpare if the user and pasword y rigth or not and send a message or re direction a new page   */

if($usuarios -> num_rows == 1):
	$datos =$usuarios ->fetch_assoc();
	echo json_encode(array ('conexion correcta' =>true, 'usuario' => $datos['pass']));

else:
	echo json_encode(array('conexion correcta' => false));

endif;


$mysqli->close();


?>