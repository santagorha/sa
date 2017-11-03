<?php
	use \Psr\Http\Message\ServerRequestInterface as Request;
	use \Psr\Http\Message\ResponseInterface as Response;

	$app = new \Slim\App;

	//Todos los eventos
	$app->get('/api/eventos', function(Request $request, Response $response){
		$consulta = 'SELECT * FROM evento';
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

