<?php
    require_once "conexion.php";
    session_start();
    
    $id_post = $_POST['id_post'];
    $texto = $_POST['texto'];

    

    $sql = "UPDATE posts SET post = '$texto' WHERE id='$id_post'";
    if ($conn->query($sql) === TRUE) {
        echo "OK";      
        header("Location: /efiphp/admin.php");
    }else {
        echo "ERROR";
    }
    mysqli_close($conn);
    /* if(!isset($_SESSION['active'])){
        if($_SESSION['username']=="admin"){
          header("Location: /efiphp/admin.php");
        }else{
          header("Location: /efiphp/index.php");
        }
      } */

   
    /* header("Location: /efiphp/admin.php"); */
?>