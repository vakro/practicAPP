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
  <title>Consulta Empresas</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></script>
   <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" media="all" type="text/css" href="../css/estilos.css" />
  <link rel="stylesheet" type="text/css" href="../libraries/dataTables/css/jquery.dataTables.css">

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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog fa-lg"></i>Opciones<span class="caret"></span></a>
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
    <li class="active"><a href="#">Ver Empresas</a></li>
    <li><a href="RegistroEmpresa.php">Registrar Empresa</a></li>     
  </ul>

     
        <center><h4>LISTADO DE EMPRESAS</h4></center>
      <div id="tabla">
        <table id="table_empresas" class='display'>
        <thead class="panel-title">
           <tr>
             <th><center>#</center></th>
             <th><center>NOMBRE CONTACTO</center></th>
             <th><center>NOMBRE EMPRESA</center></th>
             <th><center>TELEFONO</center></th>
             <th><center>CORREO</center></th>
             <th><center>EDITAR</center></th>
             <th><center>ELIMINAR</center></th>
           </tr>
           </thead>
           <tbody id="tbodyEmpresa"></tbody>
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
  <div class="modal fade" id="modalActualizarEmpresa" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><center><b>Actualizar Empresa</b></center></h4>
        </div>
        <div class="modal-body">

         
            <div class="modal-body">
              <div class="form-group">
                <label for="nit" class="col-sm-2 control-label" name="nombre_contacto">Nombre contacto: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"></input>                              
                 </div>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="input-empresa" class="col-sm-2 control-label" name="nombre_empresa">Nombre empresa: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa"></input>                              
                 </div>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="input-telefono" class="col-sm-2 control-label" name="telefono">Teléfono: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="telefono" name="telefono"></input>                              
                 </div>
              </div>
            </div>

            <div class="modal-body">
              <div class="form-group">
                <label for="input-correo" class="col-sm-2 control-label" name="correo">Correo: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="correo" name="correo"></input>                              
                 </div>
              </div>
            </div> 

            <input id="idEmpresa" type="hidden" value="">  

        </div>
        <div class="modal-footer">
          <button id="actualizarEmpresa" type="button" class="btn btn-success" data-dismiss="modal">Actualizar</button>
          <input id="idEmpresa" type="hidden" value="">
        </div>
      </div>
      
    </div>
  </div>
  <!-- FIN MODAL -->



</body>
<script type="text/javascript" src="../libraries/dataTables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../js/empresa.js"></script>
<script type="text/javascript" src="../js/welcome.js"></script>
</html>