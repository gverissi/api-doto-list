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
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

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
	$todo = (string) $data['todo'];
    $controller->persistAToDo($todo);
}
else if ($req_method === "DELETE") {
	$data = json_decode(file_get_contents("php://input"), true);
	$todoId = (string) $data["todoId"];
	$controller->deleteAToDo($todoId);
}
