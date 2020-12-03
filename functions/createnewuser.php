<?php
    require_once 'conexion.php';
    if(isset($_POST['create'])){
        if(!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['password'])){
            
    
            $username = $_POST['username'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $password = md5($_POST["password"]);
            $imagen_name = $_FILES['imagen']['name'];
            $imagen_content = $_FILES['imagen']['tmp_name'];
            $ruta_guardado = "../img/img_perfiles";

            $ruta_guardado = $ruta_guardado."/".$imagen_name;
            
            $ruta_mostrar = "./img/img_perfiles"."/".$imagen_name;
            move_uploaded_file($imagen_content, $ruta_guardado);

            $query = "INSERT INTO usuarios (nombre, apellido, mail, password, username, id_fotoperfil) VALUES ('$nombre', '$apellido', '$email', '$password', '$username', '$ruta_mostrar');";
            $conn->query($query);

            $header = "Nuevo registro de usuario";
            $destinatario = "m.olmedo@itecriocuarto.org.arg";
            
            mail($destinatario, "Nuevo registro de usuario", "Nuevo de usuario $username en la plataforma", $header);

            header("Location: /efiphp/login.php");

        }
    }
    
   

?>