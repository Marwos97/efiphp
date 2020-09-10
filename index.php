<?php
session_start();
include_once "./functions/conexion.php";

if(!isset($_SESSION['active'])){
  if($_SESSION['username']=="admin"){
    header("Location: /efiphp/admin/");
  }else{
    header("Location: /efiphp/login.php");
  }
}

    

function logout(){
    session_destroy();
    header('Location: login.php');
}

if(array_key_exists('logout',$_POST)){
    logout();
 }

$result = $conn->query("SELECT * FROM posts ");


$cant_resultados = mysqli_num_rows($result);

echo $cant_resultados;



$resultNombres = $conn->query("SELECT DISTINCT usuarios.nombre, usuarios.id FROM usuarios, posts WHERE usuarios.id = posts.id_user ;");

$cant_nombres = mysqli_num_rows($resultNombres);
/* echo $cant_nombres; */





 while($row = $resultNombres->fetch_assoc()){
   
   $dataNombres[] =[
    "nombre" => (string)$row['nombre'],
    "id" => (string)$row['id']
   ];
      
  
   
 }

 /* var_dump($dataNombres); */

$datos = mysqli_fetch_array($result);

$id_user = $_SESSION['idUser'];

$resultUser = $conn->query("SELECT * FROM usuarios WHERE id= '$id_user';");
$user = $resultUser->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Grandstander:ital,wght@1,200&family=Roboto+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/estilos.css">

   

    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <a class="navbar-brand" href="#"> Bienvenido <?php echo $_SESSION["username"];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <form method="POST">
                        <button name="logout" id="logout" class="btn btn-warning">Logout</button>
                    </form>
                </li>
                <li class="nav-item active">
                    <a href="edituser.php?id=<?php echo $_SESSION['idUser']; ?>" class="btn btn-warning">Editar Datos</a>
                </li>

            </ul>
        </div>
        </div>
    </nav>

  <!-- Page Content -->
  <div class="container" style="padding-top: 10%;">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">Actualiza, publica, todo lo puedes hacer aqui</h1>

        <?php if(isset($user['estado'])&& $user['estado'] != "") : ?>

          <h3 class="bg-success rounded-lg"><b>Este es tu estado actual:</b><br><small><?php echo $user['estado'];?></small></h3>
        <?php elseif($user['estado']==""): ?>
          <h3 class="bg-success rounded-lg"><b>Escribe tu estado, No pierdas el tiempo!:</b></h3>
        <?php else: ?>
        
          <h3 class="bg-success rounded-lg"><b>Escribe tu estado, No pierdas el tiempo!:</b></h3>

        <?php endif ?>

        <hr>
        
        <div class="card my-4 bg-dark">
          <h5 class="card-header">Dime como te sientes!</h5>
          <div class="card-body">
            <form action="./functions/savestatus.php" method="POST">
              <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['idUser'];?>" placeholder="<?php echo $_SESSION['id'];?>">
                <textarea type="text" name="estado" id="estado" class="form-control" rows="1" maxlength="255" ></textarea>
                <button type="submit" class="btn btn-danger btn-block">Actualiza tu estado!</button>
              </div>
              
            </form>
          </div>
        </div>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Deja tu post aqui:</h5>
          <div class="card-body">
            <form action="./functions/savepost.php" method="POST">
              <div class="form-group">
                <input type="hidden" name="id_user" value="<?php echo $_SESSION['idUser'];?>" placeholder="<?php echo $_SESSION['id'];?>">
                <textarea name="texto" id="texto" class="form-control" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">POSTEA!</button>
            </form>
          </div>
        </div>

        <!-- Single Comment -->

      <h2 class="text-center">POSTEOS DE LA COMUNIDAD</h2>

      <?php while($row = $result->fetch_assoc()) : ?>
        
          <div class="media mb-4 ">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <?php  for($i = 0; $i < $cant_nombres; $i++) : ?>
                <?php if($row["id_user"] == $dataNombres[$i]['id']) : ?>
                  <h5  class="mt-0"><b><?php echo $dataNombres[$i]['nombre']; ?></b></h5>
                <?php endif  ?>
              <?php endfor  ?>
              
                <small class="bg-info rounded-lg "><b>Posteo:</b></small>
                <p id = "post" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-dark rounded-pill" style="padding-left: 2%;"><?php echo $row['post']; ?></p>
              
            
            </div>
          </div>
        
      <?php endwhile ?>


        

      </div>

      <!-- Sidebar Widgets Column -->
      

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">WEB DISEÑADA POR MARQUITOS</p>
    </div>
    <!-- /.container -->
  </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>