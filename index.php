<?php
  $mensaje="null";
  if (!empty($_POST['nombre']) && !empty($_POST['correo']) && !empty($_POST['msg'])) {
    $nombre=$_POST['nombre'];
    $email=$_POST['correo'];
    $msg=$_POST['msg'];
    //-----------------------------------
      $to = "jhonatanav20182@gmail.com";
      $subject = "Has recibido un mensaje de tu sitio web.";
      $txt = "Recibió una opinión del: $nombre.\n\n$msg";
      $headers = "De: $email\nResponder a: $email";
      
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        mail($to,$subject,$txt,$headers);
        $mensaje="Mensaje enviado";
        $c="1";
      } else {
        $mensaje="Error, el mensaje no pudo ser enviado";
        $c="2";
      }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Inicio</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.css" rel="stylesheet">

  <!-- estilos -->
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/sweetalert.css">
  <link rel="icon" type="image/png" href="img/Asocampo.png">

</head>
<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container"  style="color: #39D768;">
      <a href="#"><img src="img/Asocampo.png" style="left: 40px; width: 80px;"></a>
      <a class="navbar-brand" href="#">Asocampo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-light" href="php/conocenos.php">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="php/contactos.php">Contactos</a>
          </li>
          <form action="index.php">
          </li>
          <li class="nav-item">
            <a class="nav-link text-light" href="php/sesion.php">Iniciar Sesión</a>
          </li>

        </form>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <h1 class="my-4">Nuestros productos</h1>
        <div class="list-group">
          <a class="list-group-item" href="?p=producto1">Verduras</a>
          <a class="list-group-item" href="?p=producto2">Frutas</a>
          <a class="list-group-item" href="?p=producto3">Productos de granja</a><br>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">
        <!--Innicio Slider-->

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/presentacion/1.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/presentacion/2.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/presentacion/3.png">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/presentacion/4.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/presentacion/5.jpg">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/presentacion/6.png">
            </div>
          </div>

          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        <!--Fin Slider-->

        <div class="row">
          <!--Productos-->
          <?php 
            $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'producto1';
            require_once 'php/'.$pagina .'.php';
          ?>
      
        </div>
      </div>
    </div>
  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
     <p class="m-0 text-center text-white">Asocampo</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/sweetalert.min.js"></script>

</body>
 <script>
      //Sección de mensajes
    var mensaje="<?php echo $mensaje?>";
    var c="<?php echo $c?>";
    if (mensaje=="null") {
      console.log('Campo vacío');
    }else{
      if (c=="1") {
        Swal.fire({
          position: 'top-end',
          type: 'success',
          title: mensaje,
          showConfirmButton: false,
          timer: 1500
        });
      }else {
        Swal.fire({
          position: 'top-end',
          type: 'error',
          title: mensaje,
          showConfirmButton: false,
          timer: 1500
        });
      }
    }
  </script>
</html>
