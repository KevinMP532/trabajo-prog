<?php

include("conexion.php");
$telefono = $_POST["telefono"];
$cedula = $_POST["cedula"];
$fechaV1 = new DateTime();
$fechaV1->modify('+1 week');
$fecha1 =  $fechaV1->format('d-m-Y') . "\n";
$fechaV2 = $fechaV1;
$fechaV2->modify('+1 month');
$fecha2 = $fechaV2->format('d-m-Y') . "\n";


$actualizar = "UPDATE usuario SET telefono = '$telefono' WHERE idUsuario = $cedula";
$resultado = mysqli_query($link, $actualizar);

$insertar = "INSERT INTO Agenda(idUsuario, fechaV1, fechaV2) VALUES ('$cedula', '$fecha1', '$fecha2')";
$resultado = mysqli_query($link, $insertar);

$agenda = "SELECT * FROM Agenda WHERE idUsuario = $cedula";
$resultado = mysqli_query($link, $agenda);

if (mysqli_num_rows($resultado)>0){
    echo "<div class='div-desp-agendado'>
                <p style='font-size:1em'>Agendado exitosamente, que desea hacer?</p>
                <a href='http://localhost/progweb/agenda-covid/frontend/home/home.php'><button class='btn-prev-agendado'>Inicio</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Consultar</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/borrar/borrar.php'><button class='btn-prev-agendado'>Borrar</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Cant. usuario por grupo</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Cant. usuarios por edad</button></a>
            </div>";
}else {
    echo "ah ocurrido un error";
}
?>