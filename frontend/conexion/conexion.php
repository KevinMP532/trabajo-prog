<?php

$link = mysqli_connect('localhost','root','');
if(!$link){
    echo "No se pudo conectar:". mysqli_error($link);
}else{
    mysqli_select_db($link,'agenda_corona');
};

?>