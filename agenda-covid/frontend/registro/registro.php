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
        <h1 class="title">Welcome to a form</h1>
        <form action="registrarse.php" method="POST">
            <label for="cedula">Ingrese su cedula</label>
            <input type="number" name="cedula"><br>
            <label for="nombre">Ingrese su Nombre</label>
            <input type="text" name="nombre">
            <label for="apellido">Ingrese su Apellido</label>
            <input type="text" name="apellido">
            <label for="fechaNac">Ingrese su fecha de nacimiento</label>
            <input type="date" name="fechaNac">
            <label for="grupo">Seleccione su grupo</label>
            <select name="grupo">
                <option value="0">Ninguno</option>
                <option value="1">Personal CTI</option>
                <option value="2">Hisopadores</option>
                <option value="3">Personal Salud General</option>
                <option value="4">Personal Educacion</option>
                <option value="5">Bomberos</option>
                <option value="6">Policias</option>
                <option value="7">Personal Residencia</option>
            </select>
            <button class="btn-form" type="submit">Registrarme</button>
        </form>
    </div>
</div>
</body>



</html>