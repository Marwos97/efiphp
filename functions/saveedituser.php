<?php
    require_once "conexion.php";
    session_start();
    $usrID = $_POST['userid'];
    
    $username = $_POST['username'];
    
    $nombre = $_POST['nombre'];
    
    $estado = $_POST['estado'];

    $apellido = $_POST['apellido'];
    
    $email = $_POST['email'];
    
    $password = $_POST['password'];

    echo $usrID ;
    
    echo "\n"; 
     
    echo $username;

    echo "\n"; 

    echo $nombre;
    echo "\n"; 
    echo $apellido;
    echo "\n"; 


    $sql = "UPDATE usuarios SET nombre = '$nombre', apellido = '$apellido', username = '$username', password='$password', mail='$email', estado = '$estado', id_fotoperfil = ''  WHERE id='$usrID'";
    if ($conn->query($sql) === TRUE) {
        echo "OK";      
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