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
<html lang="es" style="overflow: block;">
<head>
  <meta charset="UTF-8">
  <title>Consulta Envíos</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../libraries/dataTables/css/jquery.dataTables.css">

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
      <ul class="nav navbar-nav navbar-left">                       
            <br><li><a href="welcome.php">INICIO</a></li>                 
      </ul>       
    </div>
    
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
      <ul class="nav navbar-nav navbar-right">             

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-lg" ></i>Opciones<span class="caret"></span> </a>
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

  <ul class="nav nav-tabs">
    <li class="active"><a href="#">Ver Envíos</a></li>
    <li><a href="RegistroEnvio.php">Registrar Envío</a></li>     
  </ul>


  <div class="page-header">
      <div class="form-group">
          <center><button class="btn btn-success" id="btnDescargarExcel"><i class="fa fa-file-excel-o fa-lg"></i> Descargar </button></center>       
      </div>

      <center><h4>LISTADO DE ENVÍOS REALIZADOS</h4></center>
      <table id="table_envios" class="display">
    
       <thead class="panel-title">
        <tr>
          <th>#</th>
          <th>DOCUMENTO</th>
          <th>NOMBRE</th>
          <th>PROGRAMA</th>
          <th>CORREO</th>
          <th>SEMESTRE</th>
          <th>EMPRESA</th>
          <th>FECHA</th>
          <th>ESTADO</th>
        </tr>
       </thead>
       <tbody id="tbodyRegistrosEnviados"></tbody>
       </table>       

  </div>
  </div>
 </div>
 
<!-- Footer -->
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
  <!-- Footer -->



  <!-- INCIO MODAL -->
  <div class="modal fade" id="modalCambiarEstadoEnvio" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Cambiar estado de envío</b></h4>
        </div>
        <div class="modal-body">
          <div class="form-group" id="contenidoSelectModal">
            <label for="estadoEnvio" class="col-sm-3 control-label" name="estadoEnvio">Estado: </label>
              <div class="col-sm-9">
                <select class="form-control" id="estadoEnvio" name="estadoEnvio">                                                                               
               </select>                              
             </div>
          </div>
        </div>
        <div class="modal-footer">
          <button id="actualizarEstado" type="button" class="btn btn-success" data-dismiss="modal">Cambiar</button>
          <input id="idRegistro" type="hidden" value="">
        </div>
      </div>
      
    </div>
  </div>
  <!-- FIN MODAL -->


</body>
  <script type="text/javascript" src="../libraries/dataTables/js/jquery.dataTables.js"></script>
  <script type="text/javascript" src="../js/verEnvios.js"></script>
  <script type="text/javascript" src="../js/welcome.js"></script>
</html>