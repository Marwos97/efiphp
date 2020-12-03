<?php
    require_once "conexion.php";

    $id_category = $_GET['id'];

    $query = "DELETE FROM categories WHERE id='$id_category'";
    $conn->query($query);

    header("Location: /efiphp/admin.php");
?>