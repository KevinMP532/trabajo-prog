<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../objects/countByAgeModel.php';

$database = new Database();
$db = $database->getConnection();

$groupCount = new countByAge($db);

$groupCount->countByAge();


$groupCount_arr = array(
    "Entre 18 y 30" => $groupCount->group1,
    "Entre 31 y 50" => $groupCount->group2,
    "Entre 51 y 65" => $groupCount->group3,
);
http_response_code(200);
echo json_encode($groupCount_arr);
