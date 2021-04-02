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
        <h1 class="title">Consultar</h1>
        <form action="" method="GET">
            <label for="cedula">Ingrese su cedula</label>
            <input type="number" name="cedula"><br>
            <button class="btn-form" type="submit">Verificar</button>   
        </form> 
        <?php

        include("conexion.php");

        if (isset($_GET["cedula"]) && $_GET["cedula"] != "") {
            $cedula = $_GET["cedula"];
            $agenda = "SELECT * FROM Agenda WHERE idUsuario = $cedula" ;
            $resultado = mysqli_query($link, $agenda);
            if (mysqli_num_rows($resultado)>0) {
                while ($usuario=mysqli_fetch_assoc($resultado)) { ?>
                    <div class='div-prev-agendado'>
                        <div class="div-content-prev-agendado">
                        
                            <p style=' font-size: 1.2em;'>Sus fechas son:</p>
                        
                        <ul>
                            <li>Primer fecha: <?php echo $usuario["fechaV1"]?></li>
                            <li>Segunda fecha: <?php echo $usuario["fechaV2"]?></li>
                        </ul>
                        <a href='http://localhost/progweb/agenda-covid/frontend/borrar/borrar.php'><button class='btn-antes-agendado'>Borrar</button></a>
                        </div>
                    </div>
                    <?php
                } 
            }  else {
                echo "<form action='../schedule/schedule.php'>
                <p style='font-size:1.2em'>No estas agendado, deseas agendarte?</p><br>
                <button class='btn-antes-agendado'>Agendarme</button>
                </form>";
            }
        }
?>
    </div>
    </div>
</body>
</html>