<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
error_reporting(0);
include_once '../db/database.php';
include_once '../objects/schedule.php';

$database = new Database();
$db = $database->getConnection();
$Schedule = new Schedule($db);
$data = json_decode(file_get_contents("php://input"));
$Schedule->idUsuario = $data->idUsuario;
$Schedule->scheduleCheck();

if ($Schedule->fechaV1 != null) {
    if ($Schedule->fechaV1 > date("Y.m.d")) {
        if ($Schedule->Scheduledelete()) {
            http_response_code(200);
            echo json_encode(array("message" => "Schedule deleted successfully."));
        } else {
            http_response_code(200);
            echo json_encode(array("message" => "Could not delete schedule."));
        };
    } else {
        http_response_code(200);
        echo json_encode(array("message" => "V1 date has already passed, deletion not performed."));
    };
} else {
    http_response_code(200);
    echo json_encode(array("message" => "User schedule not found."));
}
