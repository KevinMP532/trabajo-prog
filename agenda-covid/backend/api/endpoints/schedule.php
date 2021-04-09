<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../db/database.php';
include_once '../objects/user.php';
include_once '../objects/schedule.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$data = json_decode(file_get_contents("php://input"));

if ($data->idUsuario == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'idUsuario' was provided"));
} else if ($data->telefono == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'telefono' was provided"));
}

$user->idUsuario = $data->idUsuario;
$user->login();

if ($user->nombre != null) {

    $userUpdate = new user($db);
    $userUpdate->idUsuario = $data->idUsuario;
    $userUpdate->telefono = $data->telefono;

    $schedule = new Schedule($db);
    $schedule->idUsuario = $data->idUsuario;
    $fechaV1 =  date('Y.m.d', strtotime('+7 days'));
    $fechaV2 = date('Y.m.d', strtotime("+37 days"));
    $schedule->fechaV1 = $fechaV1;
    $schedule->fechaV2 = $fechaV2;
    $schedule->scheduleCheck();
    if ($schedule->idUsuario == "not found") {
        $schedule->idUsuario = $data->idUsuario;
        $userUpdate->setPhoneNumber();
        if ($schedule->schedule()) {
            http_response_code(200);
            echo json_encode(array("message" => "User scheduled successufully"));
        }
    } else {
        http_response_code(200);
        echo json_encode(array("message" => "User has already been scheduled"));
    }
} else {
    http_response_code(200);
    echo json_encode(array("message" => "User does not exist."));
}
