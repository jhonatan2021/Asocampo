<?php
  session_start();
  require 'conexion.php';
  $mensaje="null";
    if (!empty($_POST['identificacion']) && !empty($_POST['contrasena'])) {
        //admin
      $records = $conn->prepare('SELECT identificacion,contrasena FROM tbladmin WHERE identificacion = :identificacion');
      $records->bindParam(':identificacion', $_POST['identificacion']);
      $records->execute();
      $results = $records->fetch(PDO::FETCH_ASSOC);
      //usuario
      $records2 = $conn->prepare('SELECT identificacion,contrasena FROM tblcliente WHERE identificacion = :identificacion');
      $records2->bindParam(':identificacion', $_POST['identificacion']);
      $records2->execute();
      $results2 = $records2->fetch(PDO::FETCH_ASSOC);

        if (password_verify($_POST['contrasena'], $results['contrasena'])) {
          $_SESSION['user_id'] = $results['identificacion'];
          header("Location: ../sesion/admin.php");
          
        }else {
             if (password_verify($_POST['contrasena'], $results2['contrasena'])) {
              $_SESSION['user_id'] = $results2['identificacion'];
              header("Location: ../sesion/admin2.php");
              
            }else{
                $mensaje="Lo sentimos, usuario y/o contraseña incorrecta";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Ubuntu" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/all.css">
    <link rel="stylesheet" href="../css/sweetalert.css">
    <link rel="icon" type="image/png" href="../img/Asocampo.png">
    <title>Aso Campo</title>
    <script>

        function numero(e){
            tecla = (document.all) ? e.KeyCode : e.which;
            if(tecla==8){
              return true;
            }
            patron =/[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
        function letra(e){
            tecla = (document.all) ? e.KeyCode : e.which;
            if(tecla==8){
              return true;
            }
            patron =/[A-Z,a-z, ]/;
            tecla_final = String.fromCharCode(tecla);
            return patron.test(tecla_final);
        }
    </script>
</head>
<body>

   <!-- Formularios -->
   <center>
             <a href="../index.php"><img src="../img/Asocampo.png" style="left: 40px; width: 80px;"></a>
             </center>
    <div class="contenedor-formularios">
        <!-- Links de los formularios -->
        <ul class="contenedor-tabs">
            <li class="tab tab-segunda active"><a href="#iniciar-sesion">Iniciar Sesión</a></li>
            <li class="tab tab-primera"><a href="#registrarse">Registrarse</a></li>
            <br>   
        </ul>  
        <!-- Contenido de los Formularios -->
        <div class="contenido-tab">
            <!-- Iniciar Sesion -->
            <div id="iniciar-sesion">
                <h1>Iniciar Sesión</h1>
                <form action="" method="post">
                    <div class="contenedor-input">
                        <label>
                            Identificación <span class="req">*</span>
                        </label>
                        <input type="text" name="identificacion" onkeypress="return numero(event)" required>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" name="contrasena" required>
                        <span class="btn-show-pass">
                            <i class="fal fa-eye-slash" id="inicio"></i>
                        </span>
                    </div>
                    <input type="submit" class="button button-block" value="Iniciar Sesión" href="inicio.php">
                </form>
            </div>

            <!-- Registrarse -->
            <div id="registrarse">
                <h1>Registrarse</h1>
                <form method="post" action="registro.php">
                    <div class="fila-arriba">
                         <div class="contenedor-input">
                            <label>
                                Identificación <span class="req">*</span>
                            </label>
                            <input type="text" name="identificacion" onkeypress="return numero(event)" required>
                        </div>
                        <div class="contenedor-input">
                            <label>
                                Nombres <span class="req">*</span>
                            </label>
                            <input type="text" name="nombres" onkeypress="return letra(event)" required >
                        </div>

                        <div class="contenedor-input">
                            <label>
                                Apellidos <span class="req">*</span>
                            </label>
                            <input type="text" name="apellidos" onkeypress="return letra(event)" required>
                        </div>
                    </div>
                   
                    <div class="contenedor-input">
                            <label>
                                Teléfono <span class="req">*</span>
                            </label>
                        <input type="text" name="telefono" onkeypress="return numero(event)" required>
                    </div>
                    <div class="contenedor-input">
                            <label>
                                Email <span class="req">*</span>
                            </label>
                        <input type="email" name="correo" required>
                    </div>
                    <div class="contenedor-input">
                        <label>
                            Contraseña <span class="req">*</span>
                        </label>
                        <input type="password" name="contrasena" required>
                        <span class="btn-show-pass">
                            <i class="fal fa-eye-slash" id="registro"></i>
                        </span>
                    </div>
                    <button type="sutmit" class="button button-block">Registrar</button>
                </form>
            </div>
        </div>
    </div>

   <script src="../js/jquery.min.js"></script>
   <script src="../js/script.js"></script>
   <script src="../js/sweetalert.min.js"></script>
    <script>
        var mensaje="<?php echo $mensaje?>";
        if (mensaje== "null") {
            console.log('Campo vacío');
        }else{
            Swal.fire(mensaje);
        }
        $('#registro').click(function() {
            $texto=document.getElementsByName('contrasena');
            if ($('#registro').hasClass('fa-eye-slash')) {
                $($texto).attr('type', 'text');
                $('#registro').removeClass('fa-eye-slash');
                $('#registro').addClass('fa-eye');
            } else {
                $('#contrasena').attr('type', 'password');
                $('#registro').removeClass('fa-eye');
                $('#registro').addClass('fa-eye-slash');
            }
        });
        $('#inicio').click(function() {
            $texto=document.getElementsByName('contrasena');
            if ($('#inicio').hasClass('fa-eye-slash')) {
                $($texto).attr('type', 'text');
                $('#inicio').removeClass('fa-eye-slash');
                $('#inicio').addClass('fa-eye');
            } else {
                $($texto).attr('type', 'password');
                $('#inicio').removeClass('fa-eye');
                $('#inicio').addClass('fa-eye-slash');
            }
        });
    </script>
</body>
</html>
