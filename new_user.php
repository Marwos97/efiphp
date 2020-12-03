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
        <form method="POST" action="./functions/createnewuser.php" class="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="exampleInputEmail1">Ingrese nombre Usuario</label>
                <input id="username" name="username" type="text" class="form-control"  aria-describedby="emailHelp">
                <h5 id="emailHelp" class="form-text ">Recuerde siempre tener acceso a su correo, ya que le llegara un correo de confirmacion</h5>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Nombre/es</label>
                <p class="alerta"></p>
                <input id="nombre"  name="nombre" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Apellido</label>
                <p class="alerta"></p>
                <input id="apellido" name="apellido" type="text" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <p class="alerta"></p>
                <input id="email" name="email" type="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <p class="alerta"></p>
                <input id="password" name="password" type="password" class="form-control" required >
            </div>
            <div class="form-group">
                <label for="imagen">Foto de perfil</label>
                <p class="alerta"></p>
                <input type="file" name="imagen" >
            </div>
            <button type="submit" class="btn btn-primary btn-block" id="create" name="create">Crear usuario</button>
            <a href="login.php" class="btn btn-danger btn-block">Volver a login</a>
        </form>
        

        </div>
    </div>
    





    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>