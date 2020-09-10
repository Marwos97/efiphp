<?php
    require_once 'conexion.php';
    
    $texto = $_POST['texto'];
    $id_user = $_POST['id_user'];
    echo $texto;
    echo "\n";
    echo $id_user;

    $query = "INSERT INTO posts (id_user, post) VALUES ('$id_user', '$texto');";
    $conn->query($query);
    header("Location: /efiphp/index.php");
?>