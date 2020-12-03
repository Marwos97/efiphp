<?php

    require_once 'conexion.php';
    
    $texto = $_POST['category'];

    echo $texto;
    echo "\n";
    echo $id_user;

    $query = "INSERT INTO categories (name) VALUES ('$texto');";
    $conn->query($query);
    $conn->close();
    header("Location: /efiphp/admin.php");
?>