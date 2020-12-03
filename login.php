<?php
    #require_once "./functions/loginuser.php"


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/estilos.css">



    <title>Document</title>
</head>
<body>
    
    <header>
        <img src="././img/header.png" style="width: 1879px; height: 100px;" alt="">
    </header>
    
    <div class="container" id="principal">
        <div class="row logueo">
        <form method="POST" action="./functions/loginuser.php">
            <div class="form-group">
                <label for="exampleInputEmail1"><b> Usuario</b> </label>
                <input id="username" name="username" type="text" class="form-control"  aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text ">Recuerde siempre tener acceso a su correo</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"><b>Password</b> </label>
                <p class="alerta"></p>
                <input id="password" name="password" type="password" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary" id="iniciarsesion"> Iniciar sesion</button>
            <a href="new_user.php" class="btn btn-primary">Crear Usuario</a>
        </form>
        

        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>