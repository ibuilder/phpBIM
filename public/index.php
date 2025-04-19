<?php
require_once '../src/Core/Router.php';
require_once '../src/Core/Request.php';
require_once '../src/Controllers/AuthController.php';
require_once '../src/Controllers/ProjectController.php';
require_once '../src/Controllers/ModelController.php';
require_once '../src/Controllers/ClashController.php';
require_once '../src/Controllers/UserController.php';
require_once '../src/Controllers/CompanyController.php';

session_start();

$request = new Request();
$router = new Router($request);

$router->get('/', [ProjectController::class, 'index']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'authenticate']);
$router->get('/register', [AuthController::class, 'register']);
$router->post('/register', [AuthController::class, 'store']);
$router->get('/projects', [ProjectController::class, 'index']);
$router->get('/projects/create', [ProjectController::class, 'create']);
$router->post('/projects', [ProjectController::class, 'store']);
$router->get('/projects/{id}', [ProjectController::class, 'show']);
$router->get('/models/upload', [ModelController::class, 'upload']);
$router->post('/models', [ModelController::class, 'store']);
$router->get('/clashes', [ClashController::class, 'index']);
$router->get('/clashes/create', [ClashController::class, 'create']);
$router->post('/clashes', [ClashController::class, 'store']);
$router->get('/clashes/{id}', [ClashController::class, 'show']);
$router->get('/clashes/edit/{id}', [ClashController::class, 'edit']);
$router->post('/clashes/update/{id}', [ClashController::class, 'update']);

$router->run();
?>