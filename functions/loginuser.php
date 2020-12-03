<?php

session_start();
$alerta = "";
require_once "conexion.php";

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'");
$cant_resultados = mysqli_num_rows($query);

if($cant_resultados == 1){
    $data = mysqli_fetch_array($query);
    $_SESSION['active'] = true;
    $_SESSION['idUser'] = $data['id'];
    $_SESSION['nombre'] = $data['nombre'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['estado'] = $data['estado'];

    if($data['id']==1 && $username == "admin"){
            header("Location: /efiphp/admin.php");    
    }else{
        header("Location: /efiphp/");
    }

    #echo "Bienvenido ". $data['nombre'];

}else{
    $alerta = "El usuario y o contraseña pueden ser incorrectos";
    #echo $username;
    #echo $password;
    session_destroy();
    header("Location: /efiphp/login.php");
    
    #echo  "No se encuentra registra";
}



?>