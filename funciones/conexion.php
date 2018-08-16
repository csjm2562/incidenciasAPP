<?php
  $mysqli=new mysqli("localhost","johan","root","login"); //MODIFICAR
  if(mysqli_connect_errno()){
    echo 'Conexion Fallida : ', mysqli_connect_error();
    exit();
  }
?>