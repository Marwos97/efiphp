<?php
    require_once "conexion.php";

    $id_user = $_GET['id'];

    $query = "DELETE FROM usuarios WHERE id='$id_user'";
    $conn->query($query);

    header("Location: /efiphp/admin.php");   


?>