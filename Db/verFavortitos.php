<?php

//inicio de sesion se deben crear las variables de sesion antes
session_start();
echo "Se encuentra logeado como: " . $_SESSION['usuario'];

//Creacion de la conexion: 
$conexion =  sqlite_open('appeventos.db');

//Creacion de la consulta
$id_usuario = 1;
$consulta = "SELECT * FROM EVENTO_USUARIO WHERE id_usuario = " . $id_usuario . " AND MARCA = 1;";

//Ejecucion de la consulta 
$resultado =  sqlite_query($conexion, $consulta);

// Impresion de resultados:

while ($fila = sqlite_fetch_array($resultado)){
	echo $fila['id_evento_usuario'] . $fila['id_usuario'] . $fila['id_evento'] . $fila['asistido'] . $fila['rol_evento'] . $fila['marca'];
}

//Cerrar la conexion

sqlite_close($conexion);
?>