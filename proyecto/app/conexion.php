<?php
 /*
 * @Archivo: Conexion.php
 * @Descripcion: Clase tipo singleton para conexion a bases de datos
 *
 */
	
	class Conexion
	{
		private $servidor;
		private $usuario;
		private $password;
		private $baseDatos;
		public $conex;
		private static $_instance;
		
		private function __construct(){
			$this-> servidor = 'localhost';
			$this-> usuario = 'root';
			$this-> password = '';
			$this-> base_datos = 'appeventos';
			$this-> conectar();
			
		} 
		
		/* Evitamos el clonaje del objeto */
		private function __clone(){
		
		}
		
		public static function getInstance(){
			if( !self::$_instance ){
				self::$_instance = new self();
			}
			return self::$_instance;
			
		}
		
		private function conectar(){
			$this-> conex = mysqli_connect( $this->servidor, $this->usuario, $this->password, $this->base_datos ) or die( 'error al conectarse a la base de datos' );
			
		}
		
				
 	}
	
	
	
?>