<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();

$user = new User($db);

$data = json_decode(file_get_contents("php://input"));
$user->idUsuario = $data->idUsuario;

$user->login();

if ($user->nombre != null) {

    $userUpdate = new user($db);
    $userUpdate->idUsuario = $data->idUsuario;
    $userUpdate->telefono = $data->telefono;

    if ($userUpdate->schedule()) {

        http_response_code(200);
        echo json_encode(array("message" => "User was updated."));
    }

    else {

        http_response_code(503);
        echo json_encode(array("message" => "Unable to update user."));
    }
} else {

    http_response_code(404);
    echo json_encode(array("message" => "User does not exist."));
}
