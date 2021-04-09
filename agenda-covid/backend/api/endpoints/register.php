<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../db/database.php';
include_once '../objects/user.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);
$data = json_decode(file_get_contents("php://input"));

if ($data->idUsuario == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'idUsuario' was provided"));
} else if ($data->nombre == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'nombre' was provided"));
} else if ($data->apellido == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'nombre' was provided"));
} else if ($data->fechaNacimiento == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'fechaNacimiento' was provided"));
} else if ($data->idGrupo == null) {
    http_response_code(200);
    echo json_encode(array("message" => "No value for 'idGrupo' was provided"));
} else if (strlen($data->idUsuario) != 8) {
    http_response_code(200);
    echo json_encode(array("message" => "'idUsuario' must be 8 characters long."));
} else if ($data->idGrupo > 7 || $data->idGrupo < 1) {
    http_response_code(200);
    echo json_encode(array("message" => "'idGrupo' must be between 1 and 7."));
} else {
    $user->idUsuario = $data->idUsuario;
    $user->login();
    if ($user->nombre == null) {
        $user->nombre = $data->nombre;
        $user->apellido = $data->apellido;
        $user->fechaNacimiento = $data->fechaNacimiento;
        $user->idGrupo = $data->idGrupo;
        if ($user->signUp()) {
            http_response_code(200);
            echo json_encode(array("message" => "User was registered successfully."));
        } else {
            http_response_code(200);
            echo json_encode(array("message" => "Could not register user."));
        };
    } else {
        http_response_code(200);
        echo json_encode(array("message" => "User already exists."));
    }
}
