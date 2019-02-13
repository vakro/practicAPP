<?php 

  session_start();
  error_reporting(0);

  if (COUNT($_SESSION['id'])==1) {
    //redirigir
    //enviar al welcome
    header("Location: welcome.php");
  }else{
    //error
    //no redireccionar
  }

?>


<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>

 <link rel="stylesheet" media="all" type="text/css" href="../css/estilos.css" />
 <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">

<style type="text/css">  
</style>

</head>

<body background="../img/fondoprincipal.png" style="background-size: cover;">
<div class="container-fluid">
<section class="login-block">
    <div class="contenedorlogin">	
       
        <a><img src="../img/logo.png"></a>
		    
        <br><br>
                <form id="formInciarsesion" class="form-horizontal" action="" method="">                   
                               
                  <div class="form-group">                        
                    <div class="col-sm-1">
                      <i class="fa fa-user" aria-hidden="true" style="font-size:28px"></i>
                    </div>                         
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value="" id="username" name="username" placeholder="Digite su usuario" >
                      <span class="help-block"></span>
                    </div>                                                  
                  </div>                 
                  
                  
                  <div class="form-group">
                   <div class="col-sm-1">
                     <i class="fa fa-unlock-alt" aria-hidden="true" style="font-size:28px"></i>
                   </div>
                  <div class="col-sm-10">                    
                    <input type="password" class="form-control" id="password" name="password" placeholder="Digite su contraseña">
                     <span class="help-block"></span>
                    </div> 
                  </div>               

                      
                    <button id="btninciarsesion" class="btn btn-primary">Iniciar Sesión</button><br><br>
                    <div class="form-group">
                    <small><h5 style="display: inline; color: #fff">Olvidaste tu contraseña? </h5><a href="recuperarContrasena.php" style="color: #0205A3">Recordar aquí</a></small><br>
                    </div>                   
                                   
                </form>	
    </div>
</section>
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
<script type="text/javascript" src="../js/logueo.js"></script>
</html>