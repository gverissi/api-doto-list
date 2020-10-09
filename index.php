<?php

use App\Controllers\MainController;

require __DIR__ . '/vendor/autoload.php';

// Load environnement data
if (file_exists(__DIR__ . '/.env')) {
    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
}

// // Test purposes
// $email = "greg@gmail.com";
// $controller = new MainController();
// $controller->persistEmail($email);

header('Content-Type: application/json ; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: X-PINGOTHER, Content-Type");


$req_method = $_SERVER['REQUEST_METHOD'];
// $route = $_GET["route"];

$controller = new MainController();

if ($req_method === "GET") {
	$data = $controller->fetchAllToDos();
	$json = json_encode($data);
	echo $json;
}
else if ($req_method === "POST") {
	$data = json_decode(file_get_contents("php://input"), true);
	$todo = (string) $data['action'];
    $data = $controller->persistAToDo($todo);
	echo json_encode($data);
}
else if ($req_method === "DELETE") {
	$todoId = (int) $_GET["todoId"];
	$data = $controller->deleteAToDo($todoId);
	echo json_encode($data);
}
