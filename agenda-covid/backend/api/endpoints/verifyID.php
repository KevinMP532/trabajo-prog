<?php
//This endpoint is obsolete. schedule.php has taken over this function.
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
error_reporting(0); 
include_once '../db/database.php';
include_once '../objects/user.php';
  
$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$data = json_decode(file_get_contents("php://input"));
$user->idUsuario = $data->idUsuario;
$user->login();
  
if($user->nombre!=null){
    $user_arr = array(
        "idUsuario" => $user->idUsuario,
        "nombre" => $user->nombre  
    );
    http_response_code(200);
    echo json_encode($user_arr);
}
else{
    http_response_code(200);
    echo json_encode(array("message" => "User does not exist."));
}
