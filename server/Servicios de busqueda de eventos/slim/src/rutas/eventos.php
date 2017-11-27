<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	$app = new \Slim\App;

	//Todos los eventos
	$app->get('/api/eventos', function(Request $request, Response $response){
		$consulta = "SELECT NOMBRE_EVENTO, FECHA, IMAGEN, RESUMEN, DESCRIPCION, CUPOS, DURACION_HORAS, CREDITOS, sede.NOMBRE_SEDE, facultad.NOMBRE_FACULTAD, categoria.NOMBRE_CATEGORIA FROM evento INNER JOIN sede ON evento.SEDE = sede.ID_SEDE INNER JOIN facultad ON evento.FACULTAD = facultad.ID_FACULTAD INNER JOIN categoria ON evento.CATEGORIA = categoria.ID_CATEGORIA  order by FECHA DESC limit 20";
		try{
			$db = new db();
			$db = $db -> conectar ();
			$ejecutar = $db->query($consulta);
			$eventos = $ejecutar -> fetchAll (PDO::FETCH_OBJ);
			$db = null;
			echo json_encode($eventos);
		}catch(PDOException $e){
			echo '{"error":{"text": '.$e->getMessage().'}';
		}
	});
	//Buscar en la tabla de eventos
	$app->get('/api/eventos/buscar/{word}', function(Request $request, Response $response){
		$word = $request -> getAttribute('word');
		$consulta = "SELECT NOMBRE_EVENTO, FECHA, IMAGEN, LUGAR, RESUMEN, DESCRIPCION, CUPOS, DURACION_HORAS, CREDITOS, sede.NOMBRE_SEDE, facultad.NOMBRE_FACULTAD,  categoria.NOMBRE_CATEGORIA FROM evento INNER JOIN sede ON evento.SEDE = sede.ID_SEDE INNER JOIN facultad ON evento.FACULTAD = facultad.ID_FACULTAD INNER JOIN categoria ON evento.CATEGORIA = categoria.ID_CATEGORIA where NOMBRE_EVENTO like '%$word%' or RESUMEN like '%$word%' or DESCRIPCION like '%$word%' or sede.NOMBRE_SEDE like '%$word%' or facultad.NOMBRE_FACULTAD like '%$word%' or categoria.NOMBRE_CATEGORIA like '%word%' order by FECHA desc";
		try{
			$db = new db();
			$db = $db -> conectar ();
			$ejecutar = $db->query($consulta);
			$eventos = $ejecutar -> fetchAll (PDO::FETCH_OBJ);
			$db = null;
			echo json_encode($eventos);
		}catch(PDOException $e){
			echo '{"error":{"text": '.$e->getMessage().'}';
		}
		
	});

