<?php 
 require_once "./functions/conexion.php";
 session_start();

 $id_edit = $_GET['id'];
 
 $result = $conn->query("SELECT * FROM posts WHERE id_user= '$id_edit';");
 $cant_posts = mysqli_num_rows($result);


 while($post = $result->fetch_assoc()){
     
    $posts[]=[
        "texto"=> (string)$post['post'],
        "id" => (int)$post["id"],
        "id_user" => (string)$post['id_user']
    ];
 }
 /* var_dump($posts); */


 $resultNombres = $conn->query("SELECT DISTINCT usuarios.nombre, usuarios.id FROM usuarios, posts WHERE usuarios.id = posts.id_user ;");
 $cant_nombres = mysqli_num_rows($resultNombres);

 while($row = $resultNombres->fetch_assoc()){
   
    $dataNombres[] =[
     "nombre" => (string)$row['nombre'],
     "id" => (string)$row['id']
    ];
 }

 function logout(){
    session_destroy();
    header('Location: login.php');
}

if(array_key_exists('logout',$_POST)){
    logout();
 }
 
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
<?php  if($cant_posts > 0) : ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
        <?php  for($i = 0; $i < $cant_nombres; $i++) : ?>
            <?php if($posts[$i]["id_user"] == $dataNombres[$i]['id']) : ?>
                <a class="navbar-brand" href="#">Estos son los posts de : <b><?php echo  $dataNombres[$i]['nombre'] ?></b></a>
            <?php endif  ?>
        <?php endfor  ?>
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
                <li>
                    <a href="admin.php" class="btn btn-primary ">Volver a admin</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>


    <div class = "container" style="padding-top: 10%;">
        <table class="table table-dark">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Post</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php for($j = 0; $j < $cant_posts; $j++) : ?>
                    
                        <tr>
                            <th scope="row"><?php echo $j; ?></th>
                            <td><?php echo $posts[$j]['texto']; ?></td>
                            <td>
                                <a href="editpost.php?id=<?php echo $posts[$j]['id']; ?>">Editar</a><br>
                                <a href="/efiphp/functions/deletepost.php?id=<?php echo $posts[$j]['id'];; ?>">Eliminar</a><br>
                            </td>
                        </tr>

                <?php endfor ?>
                
            </tbody>
        </table>
<?php  else :?>
    <div class="container">
        <div class="row" style="padding-top: 50%;">
            <div class="col-lg text-center">
                <h1>El usuario no posee publicaciones</h1><br>
                <a href="admin.php" class="btn btn-primary">Volver a administrador</a>
            </div>
            
            
        </div>
    </div>
<?php  endif ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>