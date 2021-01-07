<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

// basic .env file parsing
if (file_exists("../.env")) {
  $variables = parse_ini_file("../.env", true);
  foreach ($variables as $key => $value) {
     putenv("$key=$value");
  }
}

$routes = array(
  'index' => array(
    'controller' => 'Skills',
    'action' => 'index'
  ),
  'step1' => array(
    'controller' => 'Skills',
    'action' => 'step1'
  ),
  'step2' => array(
    'controller' => 'Skills',
    'action' => 'step2'
  ),
  'step3' => array(
    'controller' => 'Skills',
    'action' => 'step3'
  ),
  
);

if (empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if (empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controller/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
