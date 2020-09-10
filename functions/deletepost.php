<?php
    require_once "conexion.php";

    $id_post = $_GET['id'];

    $query = "DELETE FROM posts WHERE id='$id_post'";
    $conn->query($query);

    header("Location: /efiphp/admin.php");   


?>