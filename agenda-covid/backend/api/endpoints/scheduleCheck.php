<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
include_once '../config/database.php';
include_once '../objects/schedule.php';
  
$database = new Database();
$db = $database->getConnection();
  
$Schedule = new Schedule($db);
  
$data = json_decode(file_get_contents("php://input"));
$Schedule->idUsuario = $data->idUsuario;
  
$Schedule->scheduleCheck();
  
if($Schedule->fechaV1!=null){
    $schedule_arr = array(
        "idUsuario" => $Schedule->idUsuario,
        "fechaV1" => $Schedule->fechaV1,
        "fechaV2" => $Schedule->fechaV2
    );
  
    http_response_code(200);
    echo json_encode($schedule_arr);
}
  
else{

    http_response_code(200);
    echo json_encode(array("message" => "User schedule not found."));
}
?>