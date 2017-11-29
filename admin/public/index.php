<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../config.php';
require '../vendor/autoload.php';

$config['displayErrorDetails'] = true;
$config['addContentLengthHeader'] = true;

$config['db']['host'] = HOST;
$config['db']['user'] = USER;
$config['db']['pass'] = PASS;
$config['db']['dbname'] = DBNAME;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();

$container['view'] = new \Slim\Views\PhpRenderer("./templates/");

$container['model'] = function ($c) {
    $db = $c['settings']['db'];
    $model = new \Persistence\Model($db['host'], $db['user'], $db['pass'], $db['dbname']);
    return $model;
};

$app->get('/', function (Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $this->view->render($response, 'login.phtml', ['user' => '', 'pass' => '']);
    } else {
        $response = $response->withRedirect("/home");
    }
    return $response;
});

$app->get('/login', function (Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $this->view->render($response, 'login.phtml', ['user' => '', 'pass' => '']);
    } else {
        $response = $response->withRedirect("/home");
    }
    return $response;
});

$app->post('/login', function (Request $request, Response $response) {
    $data = $request->getParsedBody();
    $loginData = [];
    $loginData['user'] = filter_var($data['user'], FILTER_SANITIZE_STRING);
    $loginData['pass'] = filter_var($data['pass'], FILTER_SANITIZE_STRING);
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login($loginData);
    if (empty($session)) {
        $response = $this->view->render($response, 'login.phtml', [
            'user' => $loginData['user'],
            'pass' => $loginData['pass']
        ]);
    } else {
        $response = $response->withRedirect("/home");
    }
    return $response;
});

$app->get('/home', function (Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $response->withRedirect("/login");
    } else {
        $response = $this->view->render($response, 'home.phtml', []);
    }
    return $response;
});

$app->get('/logout', function (Request $resquest, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (!empty($session)) {
        $controllerSession->logout();
    }
    $response = $response->withRedirect("/login");
    return $response;
});

$app->get('/createEvent', function(Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $response->withRedirect("/login");
    } else {
        $controllerCategory = new \Controllers\ControllerCategory($this->model);
        $controllerHeadquarters = new \Controllers\ControllerHeadquarters($this->model);
        $response = $this->view->render($response, 'createEvent.phtml', [
            'categorys' => $controllerCategory->getCategorys(),
            'headquarters' => $controllerHeadquarters->getHeadquarters()
        ]);
    }
    return $response;
});

$app->post('/createEvent', function(Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $response->withRedirect("/login");
    } else {
        $response = $response->withRedirect("/home");
    }
    return $response;
});

$app->get('/editEvent', function(Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $response->withRedirect("/login");
    } else {
        $response = $this->view->render($response, 'editEvent.phtml', []);
    }
    return $response;
});

$app->post('/editEvent', function(Request $request, Response $response) {
    $controllerSession = new \Controllers\ControllerSession($this->model);
    $session = $controllerSession->login();
    if (empty($session)) {
        $response = $response->withRedirect("/login");
    } else {
        //...
        $response = $response->withRedirect("/home");
    }
    return $response;
});

$app->run();

