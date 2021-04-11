<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
error_reporting(0);
include_once '../db/database.php';
include_once '../objects/countByAgeModel.php';

$database = new Database();
$db = $database->getConnection();
$groupCount = new countByAge($db);
$groupCount->countByAge();

$groupCount_arr = array(
    "Entre_18_y_30" => $groupCount->group1,
    "Entre_31_y_50" => $groupCount->group2,
    "Entre_51_y_65" => $groupCount->group3,
);
http_response_code(200);
echo json_encode($groupCount_arr);
