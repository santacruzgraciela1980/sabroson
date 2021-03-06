<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<link rel="stylesheet" href="estilos/estilo.css">    

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="scripts/redirigir.js"></script>
    
    <title>Sabroz&oacute</title>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Sabros&oacute;n</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../Index.php"> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Registro
        </a>
        <?php
         session_start();
         if(isset($_SESSION['user'])){
           $nombre=$_SESSION['user']['nombre'];
           $mail=$_SESSION['user']['mail'];
            echo "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
                 echo "<a class='dropdown-item' href='#'>$nombre</a>"; 
                 echo "<a class='dropdown-item' href='#'>Cambiar contraseña</a>";
                 echo"<form action='../acciones/cerrar.php' method='POST'>";
                      echo"<input type='submit' class='dropdown-item' value='Cerrar sesi&oacute;n'>"; 
                 echo"</form>"; 
          echo"</div>"; 
         }
         if(!isset($_SESSION['user'])){
             echo "<div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'>";
                  echo "<a class='dropdown-item' href='../interfaces/login.php'>Iniciar sesi&oacute;n</a>"; 
                  echo "<a class='dropdown-item' href='../interfaces/registro.php'>Crear una cuenta</a>";
           echo"</div>"; 
          }
        ?>
        
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Productos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="combos.php">Combos</a>
          <a class="dropdown-item" href="pizzas.php">Pizzas<span class="sr-only">(current)</span></a>
          <a class="dropdown-item" href="empanadas.php">Empanadas</a>
          <a class="dropdown-item" href="hamburguesas.php">Hamburguesas</a>
          <a class="dropdown-item" href="bebidas.php">Bebidas</a>
          <a class="dropdown-item" href="postres.php">Postres</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../interfaces/carrito.php">Carrito</a>
      </li>
    
    </ul>
  </div>
</nav><br><br>



<div class="container">

  <div class="row">






        <div class="col-sm-4">  
        <div class="card bg-dark" style="width: 18rem; color:white; text-align:center">
        <img src="https://www.supermercadoacuario.com.ar/app/files/company_35/products/80222_7797257000718.jpg" class="card-img-top" alt="...">
            <div class="card-body">           
                <h5 class="card-title" >Aguas saborizadas 1 1/2 L</h5>
                <p class="card-text">$100</p>
                <?php if(isset($_SESSION['user'])){?>
                <form action="../acciones/comprar.php" method="POST">
                    <input type="hidden" name="producto" value="agua">
                    <input type="hidden" name="precio" value="$100">
                    <input type="hidden" name="carrito" <?php echo "value='$mail'"?>>
                    <input class="btn btn-primary" type="submit" value="Agregar al carrito">
                </form>
                <?php }?>
                <?php 
                  if(!isset($_SESSION['user'])){
                    echo "<button class='btn btn-primary' onclick='cambiar();'>Comprar</button>";
                  }
                ?>
                
            </div>
        </div>
    </div>


    <div class="col-sm-4">  
        <div class="card bg-dark" style="width: 18rem; color:white; text-align:center">
        <img src="https://http2.mlstatic.com/D_NQ_NP_930739-MLA31717379400_082019-O.webp" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" >Gaseosas de 2 1/4 L</h5>
                <p class="card-text">$150</p>
                <?php if(isset($_SESSION['user'])){?>
                <form action="../acciones/comprar.php" method="POST">
                    <input type="hidden" name="producto" value="gaseosa">
                    <input type="hidden" name="precio" value="$150">
                    <input type="hidden" name="carrito" <?php echo "value='$mail'"?>>
                    <input class="btn btn-primary" type="submit" value="Agregar al carrito">
                </form>
                <?php }?>
                <?php 
                  if(!isset($_SESSION['user'])){
                    echo "<button class='btn btn-primary' onclick='cambiar();'>Comprar</button>";
                  }
                ?>
            </div>
        </div>
    </div>

    <div class="col-sm-4">  
        <div class="card bg-dark" style="width: 18rem; color:white; text-align:center">
        <img src="https://d26lpennugtm8s.cloudfront.net/stores/835/701/products/pack-corona-sin-fondo1-bc6341b93fdb689ef015865528074423-480-0.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" >Cerveza porrón de 500 mlt</h5>
                <p class="card-text">$120</p>
                <?php if(isset($_SESSION['user'])){?>
                <form action="../acciones/comprar.php" method="POST">
                    <input type="hidden" name="producto" value="Cerveza">
                    <input type="hidden" name="precio" value="$120">
                    <input type="hidden" name="carrito" <?php echo "value='$mail'"?>>
                    <input class="btn btn-primary" type="submit" value="Agregar al carrito">
                </form>
                <?php }?>
                <?php 
                  if(!isset($_SESSION['user'])){
                    echo "<button class='btn btn-primary' onclick='cambiar();'>Comprar</button>";
                  }
                ?>
            </div>
        </div>
    </div>
   
  </div>
</div>
</div>
</body>
</html>
