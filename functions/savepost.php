<?php

    require_once 'conexion.php';
    
    $texto = $_POST['texto'];
    $id_user = $_POST['id_user'];
    $category_id = $_POST['category_id'];
    echo $texto;
    echo "\n";
    echo $id_user;
    echo "\n";
    echo $category_id;

    $query = "INSERT INTO posts (id_user, post, id_category) VALUES ('$id_user', '$texto', '$category_id');";
    $conn->query($query);
    $conn->close();
    $random = random_int(0, 1000);
    header("Location: /efiphp/index.php?$random");

?>