<?php
    require_once "./functions/conexion.php";
    session_start();

    $id_edit = $_GET['id'];

    $result = $conn->query("SELECT * FROM usuarios WHERE id= '$id_edit';");

    $user = $result->fetch_assoc();



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
    <div class="container" id="principal">
        <div class="row logueo">
        <form method="POST" action="./functions/saveedituser.php" class="">
            <h4>TENGA EN CUENTA QUE ESTA CAMBIANDO POR COMPLETO EL PERFIL DE UNA PERSONA</h4>
            <div class="form-group">
                <label for="exampleInputEmail1">Ingrese nuevo nombre usuario</label>
                <input type="hidden" value="<?php echo $user['id'];?>" name="userid">
                <input id="username" name="username" type="text" class="form-control"  aria-describedby="emailHelp" value="<?php echo $user['username'];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingrese nuevo Nombre/es</label>
                <p class="alerta"></p>
                <input id="nombre" name="nombre" type="text" class="form-control" value="<?php echo $user['nombre'];?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingrese nuevo Apellido</label>
                <p class="alerta"></p>
                <input id="apellido" name="apellido" type="text" class="form-control" value="<?php echo $user['apellido'];?>" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingrese nuevo Email</label>
                <p class="alerta"></p>
                <input id="email" name="email" type="email" class="form-control" value="<?php echo $user['mail'];?>">
            </div>
            <?php if($_SESSION['nombre']== "admin") : ?>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ingrese nuevo Estado</label>
                    <p class="alerta"></p>
                    <input id="estado" name="estado" type="text" class="form-control" value="<?php echo $user['estado'];?>">
                </div>
            <?php  endif ?>
            <div class="form-group">
                <label for="exampleInputPassword1">Ingrese nuevo Password</label>
                <p class="alerta"></p>
                <input id="password" name="password" type="password" class="form-control" value="<?php echo $user['password'];?>">
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" id="guardarcambios">Guardar cambios</button>
            
            <?php if($_SESSION['nombre']== "admin") : ?>
                <a href="admin.php" class="btn btn-danger btn-block">Volver a administrador</a>
            <?php  else: ?>
                <a href="index.php" class="btn btn-danger btn-block">Volver</a>
            <?php  endif ?>



        </form>
            
        

        </div>
    </div>
    





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>