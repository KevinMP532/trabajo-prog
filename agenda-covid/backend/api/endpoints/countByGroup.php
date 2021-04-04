<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');

include_once '../config/database.php';
include_once '../objects/countByGroupModel.php';

$database = new Database();
$db = $database->getConnection();

$groupCount = new countByGroup($db);

$groupCount->countByGroup();


$groupCount_arr = array(
    "Personal CTI" => $groupCount->group1Count,
    "Hisopadores" => $groupCount->group2Count,
    "Personal Salud General" => $groupCount->group3Count,
    "Personal Educacion" => $groupCount->group4Count,
    "Bomberos" => $groupCount->group5Count,
    "Policia" => $groupCount->group6Count,
    "Personal Residencia" => $groupCount->group7Count,
);
http_response_code(200);
echo json_encode($groupCount_arr);
