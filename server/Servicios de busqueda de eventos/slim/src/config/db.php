<?php
	class db{
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		private $base = 'appeventos';

		public function conectar (){
			$conexion_mysql = "mysql:host=$this->host;dbname=$this->base";
			$conexionBD = new PDO($conexion_mysql, $this->user, $this->pass);
			$conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Arreglar cotejamiento de codificación BD
			$conexionBD -> exec("set names utf8");
			return $conexionBD;
		}
	}

?>