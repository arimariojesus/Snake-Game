<?php

// HEADER
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once('./app/Controller/Players.php');

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$controller = null;
$data = null;
parse_str(file_get_contents('php://input'), $data);

$ex = explode('/', $uri);
$ex = array_filter(array_values($ex));

if(isset($ex[0]))
  $controller = $ex[0];

$playerController = new Players();

switch ($method) {
  case 'GET':
    if($controller != null) {
      $playerController->getRanking();
    }else {
      echo json_encode(['result' => 'invalid']);
    }
  break;
  case 'POST':
    if($controller != null && $data != null) {
      $playerController->include($data);
    }else {
      echo json_encode(['result' => 'invalid']);
    }
  break;
  case 'PUT':
    if($controller != null && $data != null) {
      $playerController->updateScore($data);
    }else {
      echo json_encode(['result' => 'invalid']);
    }
  break;
}