<?php
    session_start();
    require_once './functions/conexion.php';
    if($_SESSION['idUser']!=1 && $_SESSION['username'] != "admin"){
        session_destroy();
        header('Location : login.php');
    }


    $result = $conn->query("SELECT * FROM usuarios");
    $cant_resultados = mysqli_num_rows($result);
    echo $cant_resultados;

    $datos = mysqli_fetch_array($result);
    
    function logout(){
        session_destroy();
        header('Location: login.php');
    }

    if(array_key_exists('logout',$_POST)){
        logout();
     }

    $result_categories = $conn->query("SELECT * FROM categories");
    $cant_resultados_categories = mysqli_num_rows($result_categories);
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
        
        
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#">ADMINISTRADOR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <form method="POST">
                        <button name="logout" id="logout" class="btn btn-warning">logout</button>
                    </form>
                </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class = "container" style="padding-top: 5%;">
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Email</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()) : ?>
                    <?php if($row['id']!=1) : ?>
                        <tr>
                            <th scope="row"><?php echo $row['id']; ?></th>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $row['apellido']; ?></td>
                            <td><?php echo $row['mail']; ?></td>
                            <td>
                                <a href="edituser.php?id=<?php echo $row['id']; ?>">Editar</a><br>
                                <a href="/efiphp/functions/deleteuser.php?id=<?php echo $row['id']; ?>">Eliminar</a><br>
                                <a href="verposts.php?id=<?php echo $row['id']; ?>">Ver Posts</a>
                            </td>
                        </tr>
                    <?php endif ?>
                <?php endwhile ?>
                
            </tbody>
        </table>
        <hr>
        <div>
            <a href="newcategory.php" class="btn btn-primary ">Nueva Categoria</a>
        </div><br>
        <?php if($cant_resultados_categories > 0) :?>
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre Categoria</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_categorie = $result_categories->fetch_assoc()) : ?>
                        <tr>
                            <th scope="row"><?php echo $row_categorie['id']; ?></th>
                            <td><?php echo $row_categorie['name']; ?></td>
                            <td>
                                <a href="editcategory.php?id=<?php echo $row_categorie['id']; ?>">Editar</a><br>
                                <a href="/efiphp/functions/deletecategory.php?id=<?php echo $row_categorie['id']; ?>">Eliminar</a><br>
                            </td>
                        </tr>
                <?php endwhile ?>
            </tbody>
        </table>
        <?php endif ?>

    </div>
    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>