<?php

declare(strict_types=1);

use Joao\Mvc\Controller\DeleteVideoController;
use Joao\Mvc\Controller\EditVideoController;
use Joao\Mvc\Controller\Error404Controller;
use Joao\Mvc\Controller\NewVideoController;
use Joao\Mvc\Controller\VideoFormController;
use Joao\Mvc\Controller\VideoListController;
use Joao\Mvc\Repository\VideoRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$dbPath = __DIR__ . '/../banco.sqlite';
$pdo = new \PDO("sqlite:$dbPath");
$videoRepository = new VideoRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';

$pathInfo= $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";

if(array_key_exists($key, $routes)){
    $controllerClass = $routes[$key];
    $controller = new $controllerClass($videoRepository);
}else{
    $controller = new \Joao\Mvc\Controller\Error404Controller();
}
$controller->processaRequisicao();

