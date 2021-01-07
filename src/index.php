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
  'home' => array(
    'controller' => 'Skills',
    'action' => 'home'
  ),
  'profile' => array(
    'controller' => 'Skills',
    'action' => 'profile'
  ),
  'progress' => array(
    'controller' => 'Skills',
    'action' => 'progress'
  ),
  'firstbreakdown' => array(
    'controller' => 'Skills',
    'action' => 'firstbreakdown'
  ),
  'secondbreakdown' => array(
    'controller' => 'Skills',
    'action' => 'secondbreakdown'
  ),
  'thirdbreakdown' => array(
    'controller' => 'Skills',
    'action' => 'thirdbreakdown'
  ),
  'settings' => array(
    'controller' => 'Skills',
    'action' => 'settings'
  ),
  'register' => array(
    'controller' => 'Skills',
    'action' => 'register'
  ),
  'login' => array(
    'controller' => 'Skills',
    'action' => 'login'
  ),
  'logout' => array(
    'controller' => 'Skills',
    'action' => 'logout'
  )
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
