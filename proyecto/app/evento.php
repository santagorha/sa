<?php

/*
 * @Archivo: usurio.php
 * @Descripcion: Validacion de usurio 
 */

	require_once( 'conexion.php' );

	class Evento 
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
			
			// $this-> getEvento();
			
		}

		
		/*
		|-------------------------------------------------------------------------------
		| Comprobamos Evento
		|-------------------------------------------------------------------------------
		*/
		public function getEvento( $getEvento ){
			$this-> arrayDatos = array(
					'evento' => $getEvento
			);

			$idEvento = $this->readEvento();

			if( mysqli_num_rows( $idEvento ) > 0 ){
				$idEvento = $idEvento;
				
				
			}else{
				$idEvento = false;
				
			}
			
			// echo json_encode( $this-> objValidate );
			return $idEvento;
						
		}
		
		
		/*
		|-------------------------------------------------------------------------------
		| Ejecutamos consulta a la base de datos
		|-------------------------------------------------------------------------------
		*/
		public function readEvento(){
			
			$this-> SQL = "SELECT * FROM evento WHERE ID_EVENTO = '%s'"; 
			
			$this-> SQL = sprintf( $this-> SQL, $this-> arrayDatos[ 'evento' ] );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}


		/*
		|-------------------------------------------------------------------------------
		| Ejecutamos consulta a la base de datos
		|-------------------------------------------------------------------------------
		*/
		public function listEventos(){
			
			$this-> SQL = "SELECT * FROM evento"; 
			
			$this-> SQL = sprintf( $this-> SQL, $this-> arrayDatos[ 'evento' ] );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			return $this-> reponse;
			
		}


		/*
		|-------------------------------------------------------------------------------
		| Actualizamos foto usurio 
		|-------------------------------------------------------------------------------
		*/
		public function updateEvento(){

			$this-> SQL = "UPDATE evento SET 
			NOMBRE_EVENTO='%s',
			FECHA='%s',
			RESUMEN='%s',
			DESCRIPCION='%s',
			LUGAR='%s',
			CUPOS='%s',
			DURACION_HORAS='%s',
			CREDITOS='%s',
			FECHA_PROGRAMADO='%s',
			FECHA_EDITADO='%s'

			WHERE ID_EVENTO='%s'";

			$this-> SQL = sprintf( $this-> SQL
					,	$_POST[ 'NOMBRE_EVENTO' ]
					,	$_POST[ 'FECHA' ]
					,	$_POST[ 'RESUMEN' ]
					,	$_POST[ 'DESCRIPCION' ]
					// ,	$_POST[ 'CATEGORIA' ]
					// ,	$_POST[ 'SEDE' ]
					,	$_POST[ 'LUGAR' ]
					,	$_POST[ 'CUPOS' ]
					,	$_POST[ 'DURACION_HORAS' ]
					// ,	$_POST[ 'FACULTAD' ]
					,	$_POST[ 'CREDITOS' ]
					,	$_POST[ 'FECHA_PROGRAMADO' ]
					,	date("Y-m-d H:i:s")
					,	$_POST[ 'ID_EVENTO' ]
				);
			// var_dump( $sql );

			$this-> reponse = $this-> conex -> query( $this-> SQL );
			// var_dump( $this-> reponse );

			if( $this-> reponse ){
				header( 'Location: ../www/eventos.php?user=' . $_POST[ 'NOMBRE1' ] . '&evento=' . $_POST[ 'ID_EVENTO' ] );

			}

			return $this-> reponse;
			
		}		
		

	}
	

if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	// Instacioamos clase
	$classEvento = new Evento();
	// Actualizamos evento
	$classEvento->updateEvento();

}
	
	
?>
