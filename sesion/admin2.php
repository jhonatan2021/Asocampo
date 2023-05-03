<?php
  session_start();
  require '../php/conexion.php';
  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT * FROM tblcliente WHERE identificacion = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Inicio</title>

  <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">

  <!-- estilos -->
  <link rel="stylesheet" href="../css/all.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
  <link rel="stylesheet" type="text/css" href="../css/formula_menu.css">
  <link rel="stylesheet" type="text/css" href="../css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/sweetalert.css">
  <link rel="icon" type="image/png" href="../img/Asocampo.png">
</head>


<body class="bg-light">
<!--Inicio-->
<button class="open-button" onclick="openForm()">Chat</button>
<div class="row chat-popup" id="myForm">
  <button type="button" class="btn-success text-white">
    <span onclick="closeForm()">&times;</span>
  </button>
  <form action="" method="post">
    <div class="col-12">
      <h1>Chat</h1>
      <input type="email" class="form-control" name="correo" placeholder="Ingrese la correo electrónico" required><br>
      <input type="text" class="form-control" name="nombre" placeholder="ingresa tu nombre" required><br>
      <label><b>Mensaje</b></label>
      <textarea placeholder="Ingrese el mensaje" name="msg" required></textarea>
    </div>
    <div class="col-12">
      <button type="submit" class="btn-success pl-5 pr-5">Enviar</button>
    </div>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<!--Fin-->
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <div class="container"  style="color: #39D768;">
      <a href=""><img src="../img/Asocampo.png" style="left: 40px; width: 80px;"></a>
      <h3 class="text-light">Asocampo</h3>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item d-md-block fecha p-3">
            <p id="diaSemana"></p>
            <p id="dia"></p>
            <p>de </p>
            <p id="mes"></p>
            <p>del </p>
            <p id="year"></p>
        </li>
        <li class="nav-item d-md-block fecha p-3">
            <p id="horas" class="horas"></p>
            <p>:</p>
            <p id="minutos" class="minutos"></p>
            <p>:</p>
            <p id="segundos" class="segundos"></p>
            <p id="ampm" class="ampm"></p>
        </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <button class="navbar-toggler dropdown-toggle d-block" data-toggle="dropdown" href="#">
              <img src="<?php echo $user['foto']; ?>" width="50" height="50" class="rounded-circle bg-light border border-light">
            <span><?php echo $user['nombres'].' '.$user['apellidos']; ?></span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item <?php echo $pagina == 'perfil-admin' ? 'active' : ''; ?>" href="?p=perfil-admin"><i class="fas fa-user text-success"></i> Perfil</a>
            <a class="dropdown-item" onclick="return salir();"><i class="fas fa-sign-out text-danger"></i> Cerrar Sesión</a>
            <a class="dropdown-item" onclick="return toggleFullScreen(document.body);"><i class="fal fa-expand text-primary" id="icono"></i> Pantalla Completa</a>
          </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <nav>
    <ul id="menu">
      <li><a href="">Menú</a>
        <ul>
          <li><a class="<?php echo $pagina == 'perfil-cliente' ? 'active' : ''; ?>" href="?p=perfil-cliente">Perfil</a>
          </li>
          <li><a href="../index.php">Página Principal</a></li>
        </ul>  
      </li>
    </ul>
  </nav>
  <div class="row bg-light">
    <div class="col-12">
      <?php 
        $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'perfil-cliente';
        require_once '../php/'.$pagina .'.php';
      ?>
    </div>
  </div>
</body>
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.min.js"></script>
<script src="../js/tabla/jquery.dataTables.js"></script>
<script src="../js/tabla/dataTables.bootstrap4.js"></script>
<script src="../js/tabla/datatables-demo.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/reloj.js"></script>
<script>
  function toggleFullScreen(el){
    if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {
        if (document.exitFullscreen) {
            $('#icono').removeClass('fa-fullscreen-exit');
            $('#icono').addClass('fa-expand');
            document.exitFullscreen();
        }else if(document.mozCancelFullScreen){
            $('#icono').removeClass('fa-fullscreen-exit');
            $('#icono').addClass('fa-expand');
            document.mozCancelFullScreen();
        }else if(document.webkitExitFullscreen){
            $('#icono').removeClass('fa-fullscreen-exit');
            $('#icono').addClass('fa-expand');
            document.webkitExitFullscreen();
        }else if(document.msExitFullscreen){
            $('#icono').removeClass('fa-fullscreen-exit');
            $('#icono').addClass('fa-expand');
            document.msExitFullscreen();
        }

    }else{
        if (document.documentElement.requestFullscreen) {
            $('#icono').removeClass('fa-expand');
            $('#icono').addClass('fa-compress');
            el.requestFullscreen();
        }else if (document.documentElement.mozRequestFullScreen) {
            $('#icono').removeClass('fa-expand');
            $('#icono').addClass('fa-compress');
            el.mozRequestFullScreen();
        }else if (document.documentElement.webkitRequestFullscreen) {
            $('#icono').removeClass('fa-expand');
            $('#icono').addClass('fa-compress');
            el.webkitRequestFullscreen();
        }else if (document.documentElement.msRequestFullscreen) {
            $('#icono').removeClass('fa-expand');
            $('#icono').addClass('fa-compress');
            el.msRequestFullscreen();
        }
    }
};
  function salir(){
    Swal.fire({
      title: '¿Deseas salir?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, Salir',
      cancelButtonText: 'No, cancelar',
    }).then((result) => {
      if (result.value) {
        window.location="../php/logout.php";
      }
    });
  }
</script>
</html>
<?php
}else{
  header('location: ../');
}
?>