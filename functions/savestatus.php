<?php
    require_once "conexion.php";

    $usrID = $_POST['id_user'];
    
    $estado = $_POST['estado'];
    
    $sql = "UPDATE usuarios SET estado = '$estado'  WHERE id='$usrID'" ;
    $conn->query($sql);

    mysqli_close($conn);

    header("Location: /efiphp/");

?>