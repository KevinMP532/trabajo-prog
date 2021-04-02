<?php

include("conexion.php");
$usuarios = "SELECT * FROM Usuario";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
    
    <?php $resultado = mysqli_query($link, $usuarios);
    $usersByGroup = array("Sin grupo" => 0 , "Personal CTI" => 0, "Hisopadores" => 0, "Personal Salud General" => 0, "Personal Educacion" => 0, "Bomberos" => 0, "Policias" => 0, "Personal Residencia" => 0);
    while ($usuario=mysqli_fetch_assoc($resultado)) { 
      switch ($usuario["idGrupo"]) {
        case 0:
          $usersByGroup["Sin grupo"] = $usersByGroup["Sin grupo"]+1;
          break;
        case 1:
          $usersByGroup["Personal CTI"] = $usersByGroup["Personal CTI"]+1;
          break;
        case 2:
          $usersByGroup["Hisopadores"] = $usersByGroup["Hisopadores"]+1;
          break;
        case 3:
          $usersByGroup["Personal Salud General"] = $usersByGroup["Personal Salud General"]+1;
          break;
        case 4:
          $usersByGroup["Personal Educacion"] = $usersByGroup["Personal Educacion"]+1;
          break;
        case 5:
          $usersByGroup["Bomberos"] = $usersByGroup["Bomberos"]+1;
          break;
        case 6:
          $usersByGroup["Policias"] = $usersByGroup["Policias"]+1;
          break;
        case 7:
          $usersByGroup["Personal Residencia"] = $usersByGroup["Personal Residencia"]+1;
          break;
      };
    };
    ?>
    <?php  
    
    echo "<center> <table border='1'> <h1> Cantidad de usuarios por grupo </h1>";
    echo "<tr>";
    foreach ($usersByGroup as $key => $value) {  
      echo " <th style='padding:10px'>".$key."</th> ";
    }
    echo "</tr>";
    echo "<tr>";
    foreach ($usersByGroup as $key => $value) {  
      echo "<td style='padding:10px; text-align: center;'>$value</td>";   
    }
    echo "</tr>";
    echo "</table> </center>";
    ?>

</body>
</html>
