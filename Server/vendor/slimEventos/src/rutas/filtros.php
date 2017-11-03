<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	$app = new \Slim\App;

	//Filtros por sede
	$app->get('/api/filtros/sede', function(Request $request, Response $response){
		$consulta = 'SELECT nombre_sede FROM sede';
		try{
			$db = new db();
			$db = $db -> conectar ();
			$ejecutar = $db->query($consulta);
			$sede = $ejecutar -> fetchAll (PDO::FETCH_OBJ);
			$db = null;
			echo json_encode($sede);
		}catch(PDOException $e){
			echo '{"error":{"text": '.$e->getMessage().'}';
		}
	});

	//Filtros por facultad
	$app->get('/api/filtros/facultad', function(Request $request, Response $response){
		$consulta = 'SELECT nombre_facultad FROM facultad';
		try{
			$db = new db();
			$db = $db -> conectar ();
			$ejecutar = $db->query($consulta);
			$facultad = $ejecutar -> fetchAll (PDO::FETCH_OBJ);
			$db = null;
			echo json_encode($facultad);
		}catch(PDOException $e){
			echo '{"error":{"text": '.$e->getMessage().'}';
		}
	});

	//Filtros por centro
	$app->get('/api/filtros/centro', function(Request $request, Response $response){
		$consulta = 'SELECT nombre_centro FROM centro';
		try{
			$db = new db();
			$db = $db -> conectar ();
			$ejecutar = $db->query($consulta);
			$centro = $ejecutar -> fetchAll (PDO::FETCH_OBJ);
			$db = null;
			echo json_encode($centro);
		}catch(PDOException $e){
			echo '{"error":{"text": '.$e->getMessage().'}';
		}
	});

	