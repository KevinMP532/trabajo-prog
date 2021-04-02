<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule</title>
    <link rel="stylesheet" href="../css/schedule.css">
</head>

<body>
<div class="body-form">
    <div class="container-form">
        <h1 class="title">Borrar</h1>
        <form action="" method="GET">
            <label for="cedula">Ingrese su cedula</label>
            <input type="number" name="cedula"><br>
            <button class="btn-form" type="submit">Verificar</button>   
        </form> 
        <?php

        include("conexion.php");

        if (isset($_GET["cedula"]) && $_GET["cedula"] != "") {
            $cedula = $_GET["cedula"];
            $agenda = "DELETE FROM Agenda WHERE idUsuario = $cedula" ;
            $resultado = mysqli_query($link, $agenda);
            $select = "SELECT * FROM Agenda WHERE idUsuario = $cedula";
            $resultado = mysqli_query($link, $select);
            if (mysqli_num_rows($resultado)>0) {
                echo "ah ocurrido un error";
            } else {
                echo "<div class='div-desp-agendado'>
                <p style='font-size:1em'>Eliminado exitosamente, que desea hacer?</p>
                <a href='http://localhost/progweb/agenda-covid/frontend/home/home.php'><button class='btn-prev-agendado'>Inicio</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/schedule/schedule.php'><button class='btn-prev-agendado'>Agendar</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Consultar</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/mostrar/mostrar.php'><button class='btn-prev-agendado'>Cant. usuario por grupo</button></a>
                <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Cant. usuarios por edad</button></a>
                </div>";
            };
        };
?>
    </div>
    </div>
</body>
</html>