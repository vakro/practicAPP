
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>PracticApp</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css" media="screen" />
   
  <style type="text/css">
  </style> 
</head>

<body>
 <div class="container">

    <nav>
       <div class="container-fluid">
         <div class="navbar-header">
           <a class="navbar-brand" href="http://www.uniajc.edu.co/">
           <img alt="Brand" src="../img/logo.png " width="100" height="47"></a>      
         </div>
        <div><center><h2>REGISTRE SU HOJA DE VIDA</h2></center></div><br><br>
        <div><p>Todos los datos aquí diligenciados deberán ser soportados con sus respectivos certificados.</p></div><br>
      </div>
    </nav>

  
   <div>
     <ul class="nav nav-tabs">
      <li role="presentation" class="active"><a href="#">Información Personal</a></li>
      <li role="presentation"><a href="#">Formación Académica</a></li>
      <li role="presentation"><a href="#">Otros Estudios</a></li>
      <li role="presentation"><a href="#">Idiomas</a></li>
      <li role="presentation"><a href="#">Experiencia Profesional</a></li>
      <li role="presentation"><a href="#">Referencias</a></li>
      <li role="presentation"><a href="#">Otros Datos</a></li>
    </ul>
  </div>
  <div class="container-fluid" >
    <div class="titulos" ><center><h3>INFORMACIÓN PERSONAL</h3></center></div><br>
      
            <form class="form-horizontal" id="forminfoPersonal" action="#" method="">   
             <div class="container1">                   
                       
               

               <div class="form-group">
                 <label for="input-tipo_identificación" class="col-sm-3 control-label" name="tipo_documento">Tipo de identificación: </label>
                   <div class="col-sm-4">
                     <select class="form-control" id="tipo_documento" name="tipo_documento">                                                                                      
                     </select>                              
                   </div>
               </div>

               <div class="form-group">
                 <label for="input-documento" class="col-sm-3 control-label" name="documento">No. Identificación: </label>
                   <div class="col-sm-4">
                     <input type="text" class="form-control" id="documento" name="documento" placeholder="No. identificación">
                   </div>
                   <i class="fa fa-search fa-2x"></i>
               </div> 

               <div class="form-group">
                 <label for="nombres" class="col-sm-3 control-label" name="nombres">Nombres: </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres">
                  </div>
               </div>

               <div class="form-group">
                 <label for="input-apellidos" class="col-sm-3 control-label" name="apellidos">Apellidos: </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                   </div>
               </div>                          

               <div class="form-group">
                 <label for="input-fecha_nacimiento" class="col-sm-3 control-label" name="fecha_nacimiento">Fecha de nacimiento: </label>
                   <div class="col-sm-4">
                     <input type='date' class="form-control" name="fecha_nacimiento" id="fecha_nacimiento" />
                   </div>
               </div>
               
               <div class="form-group">
                 <label for="select-estado_civil" class="col-sm-3 control-label" name="genero">Género: </label>
                  <div class="col-sm-4">
                    <select class="form-control" id="genero" name="genero">                               
                    </select>
                  </div>
               </div>

               <div class="form-group">
                 <label for="select-estado_civil" class="col-sm-3 control-label" name="estado_civil">Estado Civil: </label>
                   <div class="col-sm-4">
                     <select class="form-control" id="estado_civil" name="estado_civil">
                     </select>
                  </div>
               </div>

               <div class="form-group">
                 <label for="select-pais_nacimiento" class="col-sm-3 control-label" name="pais_nacimiento">País de nacimiento: </label>
                  <div class="col-sm-4">
                     <select class="form-control" id="pais_nacimiento" name="pais_nacimiento">
                     </select> 
                  </div>
               </div> 

               <div class="form-group">
                 <label for="select-depto_nacimiento" class="col-sm-3 control-label" name="depto_nacimiento">Departamento de nacimiento: </label>
                   <div class="col-sm-4">
                      <select class="form-control" id="depto_nacimiento" name="depto_nacimiento">
                        <option value='0'>-- Seleccione --</option>                                                               
                      </select> 
                   </div>
               </div>

               <div class="form-group">
                 <label for="select-ciudad_nacimiento" class="col-sm-3 control-label" name="ciudad_nacimiento">Ciudad de nacimiento: </label>
                   <div class="col-sm-4">
                       <select class="form-control" id="ciudad_nacimiento" name="ciudad_nacimiento"> 
                         <option value='0'>-- Seleccione --</option>                                                            
                       </select> 
                   </div>
               </div>

               <div class="form-group">
                 <label for="input-direccion" class="col-sm-3 control-label" name="direccion">Dirección residencia: </label>
                   <div class="col-sm-6">
                     <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion residencia">
                   </div>
               </div>

               <div class="form-group">
                 <label for="input-telefono" class="col-sm-3 control-label" name="telefono">Teléfono: </label>
                   <div class="col-sm-4">
                      <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono">
                  </div>
               </div>
             
               <div class="form-group">
                 <label for="input-celular" class="col-sm-3 control-label" name="celular">Celular: </label>
                   <div class="col-sm-4">
                      <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular">
                   </div>
               </div>

                <div class="form-group">
                 <label for="input-correo" class="col-sm-3 control-label" name="correo">Email: </label>
                    <div class="col-sm-6">
                      <input type="email" class="form-control" id="correo" name="correo" placeholder="Email">
                    </div>
               </div>   


               <div class="form-group">
                 <label for="select-facultad" class="col-sm-3 control-label" name="facultad">Facultad: </label>
                  <div class="col-sm-6">
                     <select class="form-control" id="facultad" name="facultad">
                     </select> 
                  </div>
               </div>                  
                
               <div class="form-group">
                 <label for="select-programa" class="col-sm-3 control-label" name="programa">Programa: </label>
                   <div class="col-sm-8">
                     <select class="form-control" id="programa" name="programa">
                        <option value='0'>-- Seleccione --</option>                                        
                     </select> 
                  </div>
               </div>       
                  
               <div class="form-group">
                 <label for="select-semestre" class="col-sm-3 control-label" name="semestre">Semestre que cursa: </label>
                    <div class="col-sm-2">
                      <select class="form-control" id="semestre" name="semestre">
                      </select> 
                   </div>
               </div>                
            </div>                      
              
        <legend></legend>    
                            
         <div class="container-fluid">
           <div class="row">
             <div class="titulos" ><font face="arial" color="000000"><center><h3>PERFIL PROFESIONAL</h3></center></font></div><br>
               <div class="container1">
                  <div class="form-group" style="text-align: center;"> 
                    <label for="text" name="perfil_profesional">Descripción breve de su perfil como profesional: Habilidades, talentos, conocimientos...</label>        
                        <textarea name="perfil_profesional" maxlength="800" style="width: 90%; resize: none; border-radius: 5px;" cols="40" rows="5" id="perfil_profesional"></textarea>                     
                        <h6 class="pull-center" id="count_message"></h6>                                    
                  </div>
                </div>
            </div>
           </div><br>

            <input type="hidden" id="idEst" name="idEst" value="">
           
           <center>
           <input id="btnActualizarInfoPersonal" type="submit" class="btn btn-warning" value="Actualizar y continuar" title="He empezado a guardar mis datos y no he terminado"></input>
           <input id="btnGuardarInfoPersonal" type="submit" class="btn btn-success" value="Guardar y continuar" title="Guardar datos y continuar con el siguiente formulario"></input>
           </center><br>                                         
               
   </div>                       
  </form> 
</div>
</div>

  <footer class="page-footer font-small special-color-dark pt-4">

    <!-- Footer Elements -->
    <div class="footer">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
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

   <!-- INCIO MODAL -->
  <div class="modal fade" id="modalRecomendacion" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b>Recomendaciones al diligenciar el formulario: </b></h4>
        </div>
        <div class="modal-body">
          <p style="color: black">Llenar la siguiente información le tomará apróximadamente  20 minutos. Recuerde contar con el tiempo necesario para ingresar todos los datos solicitados.<br><br>
          Todos los datos suministrados deben ser debidamente soportados a la hora de presentar su hoja de vida.<br><br>
          Al diligenciar los campos tenga en cuenta: <br><br>
          * Los nombres propios empiezan con mayúscula.<br>
          * Debe ingresar como mínimo dos referencias personales.<br>
          *Para mejor presentación de su hoja de vida se le solicita subir una foto, esta debe tener un peso menor a 16MB.<br>
          * Al final del formulario debe presionar el botón "TERMINAR" para poder descargar su hoja de vida en PDF.<br><br>
          ¡Éxitos!</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Entendido</button>
        </div>
      </div>
      
    </div>
  </div>
  <!-- FIN MODAL -->



</body>
</center>
  <script type="text/javascript" src="../libraries/validaciones/validaciones.js"></script>
  <script type="text/javascript" src="../js/personal.js"></script>
</html>