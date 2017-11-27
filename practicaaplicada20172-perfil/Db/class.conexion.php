<?php
//Conexion a la base de datos utilizando PDO, debe estar activado en el host 
	class Connection{
		public function get_conection(){
			$user = "root";
			$pass = "";
			$host = "localhost";
			$db = "appeventos";
			$connection = new PDO("mysql:host=$host;dbname:", $user, $pass);
			return $connection;
		}
	}
?>
