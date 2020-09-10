<?php
    require_once 'conexion.php';
    if(isset($_POST['create'])){
        if(!empty($_POST['username']) && !empty($_POST['nombre']) && !empty($_POST['password'])){
            
            $nameRedMail = "m.olmedo@itecriocuarto.org.ar";
            $username = $_POST['username'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $query = "INSERT INTO usuarios (nombre, apellido, mail, password, username) VALUES ('$nombre', '$apellido', '$email', '$password', '$username');";
            $conn->query($query);

            $contenido = "Bienvenido a esta nueva red social ". $nombre . "\nSeñor/a: ". $apellido . " Es un placer tenerte como nuevo integrante de esta gran comunidad";

            if (mail($email, $nameRedMail, $contenido) === TRUE ){
                echo "se envio";
            }

            

            /* header("Location: /efiphp/login.php"); */

        }
    }
    
   

?>