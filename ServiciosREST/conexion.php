<?php

$mysqli = new mysqli ('localhost','root','','log_servicio');
if($mysqli->connect_errno):

	echo "error al conectarse".$mysqli->connect_error;
endif;

?>