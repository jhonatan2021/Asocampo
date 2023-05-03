<?php
session_start();
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
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- estilos -->
  <link href="css/shop-homepage.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="stylesheet" href="css/all.css">
  <link rel="stylesheet" href="css/sweetalert.css">

</head>


<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container"  style="color: #39D768;">
      <a href="#"><img src="img/Asocampo.png" style="left: 40px; width: 80px;"></a>
      <a class="navbar-brand" href="#">Asocampo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Inicio
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Conocenos">Conócenos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Contactos">Contactos</a>
          </li>
          <form action="index.php">
          </li>
          <li class="nav-item">
          <a class="nav-link" href="index.php">Cerrar Sesión</a>
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
          <a href="verduras1.php" class="list-group-item">Verduras</a>
          <a href="frutas1.php" class="list-group-item">Frutas</a>
          <a href="productos1.php" class="list-group-item">Productos de granja</a>
          <a href="oferta.php" class="list-group-item">Ofertas</a>
        </div>

       <br>
         <input type="text" id="buscar-pal" class="buscador" onkeyup="autocompletado()" placeholder="Buscar" style="height: 55px; width: 250px; border-radius: 10px; background-color: white; color: black;">
  <div>
      <ul id="demo"></ul>
  </div>
  
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/.jpg" style="height: 400px; width: 900px;" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/.png" style="height: 400px; width: 900px;" alt="Third slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/.png" style="height: 400px; width: 900px;" alt="Third slide">
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

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$1</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$1</h5>
                <p class="card-text">
                 </p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$2</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$2</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="img/.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"></a>
                </h4>
                <h5>$2</h5>
                <p class="card-text"></p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
       <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the chat form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}

/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: #ccffcc;
}

/* Full-width textarea */
.form-container textarea {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: #ff1a1a;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}

.input {
  color: black;
}

</style>
</head>
<body>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>
    <input type="email" class="input" name="correo" placeholder="correo" required><br>
    <input type="text" class="input" name="nombre" placeholder="ingresa tu nombre"><br>
    <label for="msg"><b></b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Enviar</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
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

</body>
</html>
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
     <p class="m-0 text-center text-white">Asocampo</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
