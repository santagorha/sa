<?php

header("Access-Control-Allow-Origin: *"); // si la API podra ser accedida desde cualquier URL
header('Access-Control-Allow-Credentials: true'); // si manejara control de accesos
header('Access-Control-Allow-Methods: PUT, GET, POST, DELETE, OPTIONS'); // los metodos permitidos para el consumo de la API
header("Access-Control-Allow-Headers: X-Requested-With"); // habilitacion de cabeceras REQUEST
header('Content-Type: text/html; charset=iso8859-1'); // codificacion de las solicitudes y las respuestas
header('P3P: CP="IDC DSP COR CURa ADMa OUR IND PHY ONL COM STA"'); // compatibilidad con cualquier navegador web

require './api/config.php';
require './persistence/DbModel.php';
require './persistence/Model.php';
require './api/controllers/ControllerSession.php';
require './api/controllers/ControllerUser.php';
require './vendor/Slim/Slim.php';

\Slim\Slim::registerAutoLoader();
$app = new \Slim\Slim();

$app->post('/login', function () use ($app) {
    $model = new Model();
    $data = array(
        'user' => $app->request->post('user'),
        'pwd' => $app->request->post('pwd')
    );
    $controllerSession = new ControllerSession($model);
    $response = $controllerSession->login($data);
    response($response['codeStatus'], $response);
});

$app->post('/logout', function () use ($app) {
    $model = new Model();
    $controllerSession = new ControllerSession($model);
    $response = $controllerSession->logout();
    response($response['codeStatus'], $response);
});

$app->post('/user', function () use ($app) {
    $model = new Model();
    $controllerUser = new ControllerUser($model);
    $response = $controllerUser->user();
    response($response['codeStatus'], $response);
});

$app->post('/usuariosEvento', function () use ($app) {
  $model = new Model();
  $data = array(
    'evento' => $app->request->post('evento')
  );
  $controllerUsersEvent = new ControllerUsersEvent($model);
  $response = $controllerUsersEvent->getUsersPerEvent($data);
  response($response['codeStatus'], $response);
});

$app->post('/confirmarAsistencia', function () use ($app) {
  $model = new Model();
  $data = array(
    'eventos' => $app->request->post('eventos')
  );
  $controllerUsersEvent = new ControllerUsersEvent($model);
  $response = $controllerUsersEvent->setAsistencia($data);
  response($response['codeStatus'], $response);
});

function response($status_code, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status_code);
    $app->contentType('application/json');
    echo json_encode($response);
}

$app->run();
