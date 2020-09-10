<?php
    $servername = "localhost";
    $username = "root";
    $password = "40575526";

    $conn = mysqli_connect($servername, $username, $password, "efiphp");

    if(!$conn){
       echo "no hay conexion bd";
    }

?>
