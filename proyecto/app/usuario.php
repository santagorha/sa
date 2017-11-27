<?php

/*
 * @Archivo: usurio.php
 * @Descripcion: Validacion de usurio 
 */

	require_once( 'conexion.php' );

	class Usuario 
	{
		private $arrayDatos;
		
		
		/*
		|-------------------------------------------------------------------------------
		| Llamamos conexion a base de datos
		|-------------------------------------------------------------------------------
		*/
		public function __construct(){
			$this-> conexion = Conexion::getInstance();
			$this-> conex = $this-> conexion -> conex;
			
			$this-> objValidate = ( object ) array(
						'validate' => true
			);			
			
			// $this-> getUsuario();
			
		}

		
		/*
		|-------------------------------------------------------------------------------
		| Comprobamos usuario
		|-------------------------------------------------------------------------------
		*/
		public function getUsuario(){
			$this-> arrayDatos = array(
					'user' => $_GET[ 'user' ]
			);

			$idUsuario = $this->readUsuario();

			if( mysqli_num_rows( $idUsuario ) > 0 ){
				$idUsuario = $idUsuario;
				
				
			}else{
				$idUsuario = false;
				
			}
			
			// echo json_encode( $this-> objValidate );
			return $idUsuario;
						
		}
		
		
		/*
		|-------------------------------------------------------------------------------
		| Ejecutamos consulta a la base de datos
		|-------------------------------------------------------------------------------
		*/
		public function readUsuario(){
			
			$this-> SQL = "SELECT * FROM usuario WHERE NOMBRE_USUARIO = '%s'"; 
			
			$this-> SQL = sprintf( $this-> SQL, $this-> arrayDatos[ 'user' ] );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}


		/*
		|-------------------------------------------------------------------------------
		| Actualizamos foto usurio 
		|-------------------------------------------------------------------------------
		*/
		public function fotoUsuario( $idUsuario, $nameImg ){

			$this-> SQL = "UPDATE usuario SET 
			FOTO='%s' 
			WHERE ID_USUARIO='%s'";

			$this-> SQL = sprintf( $this-> SQL
					,	$nameImg
					,	$idUsuario
				);
			// var_dump( $sql );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}		
		

	}
	
	
	
	
?>
