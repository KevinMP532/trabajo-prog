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
            <h1 class="title">Agendarse</h1>
            <form action="" method="GET">
                <label for="cedula">Ingrese su cedula</label>
                <input type="number" name="cedula"><br>
                <button class="btn-form" type="submit">Verificar</button>   
            </form> 
            <?php

            include("conexion.php");

            if (isset($_GET["cedula"]) && $_GET["cedula"] != "") {
                $cedula = $_GET["cedula"];
                $usuario = "SELECT * FROM Usuario WHERE idUsuario = $cedula" ;
                $agenda = "SELECT * FROM Agenda WHERE idUsuario = $cedula" ;
                $resultado = mysqli_query($link, $usuario);
                $resultado2 = mysqli_query($link, $agenda);
                if (mysqli_num_rows($resultado)>0 && mysqli_num_rows($resultado2)>0) {
                    echo "<div class='div-desp-agendado'><center>
                    <p style=' font-size: 1.2em;'>Ya estas agendado, puedes consultar la fecha de vacunacion o borrar tu agenda</p></center>
                    <a href='http://localhost/progweb/agenda-covid/frontend/consultar/consultar.php'><button class='btn-prev-agendado'>Consultar</button></a>
                    <a href='http://localhost/progweb/agenda-covid/frontend/borrar/borrar.php'><button class='btn-prev-agendado'>Borrar</button></a>
                    </div>";
                } elseif (mysqli_num_rows($resultado)>0) {
                    echo "<form action='agendarse.php' method='POST'>
                    <label for='cedula'>Su cedula es:</label>
                    <input type='number' name=cedula value='$cedula'><br>
                    <label for='telefono'>Ingrese su numero telefonico</label>
                    <input type='number' name=telefono><br>
                    <button type=submit class='btn-form'>Agendarme</button>
                </form>";
                } else {
                    echo "<form action='../registro/registro.php'>
                    <p style=font-size:'1em'>No estas ingresado como usuario, deseas registrarte?</p>
                    <button class='btn-form'>Registarse</button>
                    </form>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>