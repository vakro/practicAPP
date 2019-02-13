<?php

  session_start();
  error_reporting(0);

  if (COUNT($_SESSION['id'])==1) {
    //hay un usuario logueado
  }else{
    //redireccionar de vuelta al login
    header("Location: login.php");
  }

?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>  
    <link rel="stylesheet" media="all" type="text/css" href="../css/estilos.css" />
    <style type="text/css">        
    </style>
</head>
<body>

<div class="container2">
<div class="col-12">
   <nav class="navbar navbar-default" style="height: 92px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

       <a class="navbar-brand" href="welcome.php">
        <img alt="Brand" src="../img/logo.PNG" width="100" height="47">
      </a>       

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
      <ul class="nav navbar-nav navbar-right">            

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="font-family: arial"><i class="fa fa-cog fa-lg"></i>Opciones<span class="caret"></span> </a>
          <ul class="dropdown-menu">
            <li><a href="actualizarUsuario.php">Cambiar Contraseña</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#" id="logout">Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

      
    <div class="page-header">
        <h4>Hola, <b><?php echo ($_SESSION["name"]); ?></b>. Bienvenid@.</h4>
    </div>

   <header>
    <a href="verHojaVida.php">
     <div class="contenedormenu" id="uno">       
       <img class="icon" src="../img/hoja.png"> 
       <p class="text">Hojas de Vida </p>     
     </div></a>

     <div class="contenedormenu" id="separador"></div>

     <a href="verEmpresas.php">
     <div class="contenedormenu" id="dos">
      <img class="icon" src="../img/empresa.png">
      <p class="text">Empresas</p>         
     </div></a>

     <div class="contenedormenu" id="separador"></div>

     <a href="verEnvios.php">
     <div class="contenedormenu" id="tres">
       <img class="icon" src="../img/envio.png">
       <p class="text">Envíos</p>         
     </div></a>

     <div class="contenedormenu" id="separador"></div>

     <a href="verUsuarios.php">
     <div class="contenedormenu" id="cuatro">
       <img class="icon" src="../img/usuarios.png"> 
       <p class="text">Usuarios</p>
     </div></a>


   </header><br>
 
</div>
</div> 

<footer class="page-footer font-small special-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="footer">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a class="btn-floating btn-fb mx-1" href="https://www.facebook.com/UNIAJC">
            <i class="fa fa-facebook fa-2x" style="font-size:22px"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a class="btn-floating btn-tw mx-1" href="https://twitter.com/UNIAJC">
            <i class="fa fa-twitter fa-2x" style="font-size:22px"> </i>
          </a>
        </li>
        
         <li class="list-inline-item">
          <a class="btn-floating btn-dribbble mx-1" href="https://www.youtube.com/user/UNIAJC">
            <i class="fa fa-youtube " style="font-size:22px"> </i>
          </a>
        </li>
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Santiago de Cali, Colombia<br>
                                           Todos los derechos reservados<br>
                                            © 2019 Copyright: <a href="http://www.uniajc.edu.co/"> Institución Universitaria Antonio José Camacho</a>
    </div>
    <!-- Copyright -->

  </footer>  
    
</body>
  <script type="text/javascript" src="../js/welcome.js"></script>
</html>