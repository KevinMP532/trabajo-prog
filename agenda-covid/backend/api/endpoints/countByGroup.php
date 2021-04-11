<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
error_reporting(0);
include_once '../db/database.php';
include_once '../objects/countByGroupModel.php';

$database = new Database();
$db = $database->getConnection();
$groupCount = new countByGroup($db);
$groupCount->countByGroup();

$groupCount_arr = array(
    "Personal_CTI" => $groupCount->group1Count,
    "Hisopadores" => $groupCount->group2Count,
    "Personal_Salud_General" => $groupCount->group3Count,
    "Personal_Educacion" => $groupCount->group4Count,
    "Bomberos" => $groupCount->group5Count,
    "Policia" => $groupCount->group6Count,
    "Personal_Residencia" => $groupCount->group7Count,
);
http_response_code(200);
echo json_encode($groupCount_arr);
