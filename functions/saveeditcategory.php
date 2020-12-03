<?php
    require_once "conexion.php";
    session_start();
    
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    

    $sql = "UPDATE categories SET name = '$category_name' WHERE id='$category_id'";
    if ($conn->query($sql) === TRUE) {
        echo "OK";      
        header("Location: /efiphp/admin.php");
    }else {
        echo "ERROR";
    }
    mysqli_close($conn);
    if(isset($_SESSION['active'])){
        if($_SESSION['username']=="admin"){
          header("Location: /efiphp/admin.php");
        }else{
          header("Location: /efiphp/index.php");
        }
      }

   
    /* header("Location: /efiphp/admin.php"); */
?>