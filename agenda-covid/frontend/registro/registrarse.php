<?php

include("conexion.php");
$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$fechaNac = $_POST["fechaNac"];
$grupo = $_POST["grupo"];

$insertar = "INSERT INTO Usuario(idUsuario, nombre, apellido, fechaNacimiento, telefono, idGrupo, activo) VALUES ('$cedula', '$nombre', '$apellido', '$fechaNac', '', '$grupo', 1)";

$resultado = mysqli_query($link, $insertar);

$usuario = "SELECT * FROM Usuario WHERE idUsuario = $cedula" ;
$resultado = mysqli_query($link, $usuario);
if (mysqli_num_rows($resultado)>0){
    echo "<form action='../schedule/schedule.php'>
                <p style='font-size:1em'>Registrado exitosamente, deseas agendarte?</p>
                <button>Agendarme</button>
                </form>";
}else {
    echo "ah ocurrido un error";
}

?>