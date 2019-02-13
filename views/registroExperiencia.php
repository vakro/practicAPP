
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>PracticApp</title>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="../libraries/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../css/estilos.css" media="screen" />
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
  
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
        <div><p>Todos los datos aquí diligenciados deberán ser comprobados con sus respectivos certificados</p></div><br>
      </div>
    </nav>

  
   <div>
     <ul class="nav nav-tabs">
      <li role="presentation"><a href="#">Información Personal</a></li>
      <li role="presentation"><a href="#">Formación Académica</a></li>
      <li role="presentation"><a href="#">Otros Estudios</a></li>
      <li role="presentation"><a href="#">Idiomas</a></li>
      <li role="presentation" class="active"><a href="#">Experiencia Profesional</a></li>
      <li role="presentation"><a href="#">Referencias</a></li>
      <li role="presentation"><a href="#">Otros Datos</a></li>
    </ul>
  </div>
  <div class="container-fluid" >
    <div class="titulos" ><center><h3>EXPERIENCIA LABORAL</h3></center></div><br>      
      <form class="form-horizontal" action="#" method="" id="formExperiencia">   
        <div class="container1">                   
                       
             <div class="form-group">
               <label for="select-ciudad_exp" class="col-sm-3 control-label" name="ciudad_exp">Ciudad: </label>
                <div class="col-sm-4">
                  <select class="form-control" id="ciudad_exp" name="ciudad_exp">
                    <option value="0">-- Seleccione --</option>                                                                                                    
                   </select>                              
                </div>
             </div>

             <div class="form-group">
               <label for="input-nombre_empresa" class="col-sm-3 control-label" name="nombre_empresa">Empresa: </label>
                 <div class="col-sm-8">
                  <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de la empresa">
                 </div>
             </div> 

              <div class="form-group">
                <label for="input-cargo" class="col-sm-3 control-label" name="cargo">Cargo: </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Cargo desempeñado">
                  </div>
             </div>

             <div class="form-group">
               <label for="input-fecha_inicio_exp" class="col-sm-3 control-label" name="fecha_inicio_exp">Fecha inicio: </label>
                 <div class="col-sm-4">
                   <input type='date' class="form-control" id="fecha_inicio_exp" name="fecha_inicio_exp"/>
                 </div>
             </div>

             <div class="form-group">
               <label for="input-fecha_fin_exp" class="col-sm-3 control-label" name="fecha_fin_exp">Fecha fin: </label>
                 <div class="col-sm-4">
                  <input type='date' class="form-control" id="fecha_fin_exp" name="fecha_fin_exp"/>
                </div>
             </div>

              <div class="form-group">
               <label for="input-desc_actividades" class="col-sm-3 control-label" name="desc_actividades">Descripción de funciones: </label>
                 <div class="col-sm-8">
                  <textarea  name="desc_actividades" id="desc_actividades" style="width: 90%; resize: none; border-radius: 5px;" cols="40" rows="5"></textarea>
                </div>
             </div>

             <input type="text" name="id_estudiante" id="id_estudiante" value="<?=$_GET['idEst']?>" hidden>                           

             </div><br>
             <center><button type="submit" class="btn btn-success" name="guardar" id="btnGuardarExperiencia" value="Añadir"><i class="fa fa-plus" aria-hidden="true" style="font-size:20px"></i> Añadir</button></center> 
                                      
            <legend></legend>  
      <div class="container1">
        <center><h4>Experiencias registradas</h4></center>
        <div id="tabla">
        <table class='table'>
           <tr>
             <th>CIUDAD</th>
             <th>EMPRESA</th>
             <th>CARGO</th>
             <th>FECHA INICIO</th>
             <th>FECHA FIN</th>
             <th>BORRAR</th>
           </tr>
           <tbody id="tbodyExperiencia"></tbody>
        </table>
      </div>           
      </div>                  
                         
                        
 </div>        
                            
     <nav aria-label="...">
       <ul class="pager">             
        <li><a href="registroIdioma.php?idEst=<?=$_GET['idEst']?>">Atrás</a></li> 
        <li><a href="registroReferencia.php?idEst=<?=$_GET['idEst']?>">Siguiente</a></li>
       </ul>
    </nav>                        

      </form> 
</div><br>
</div>     
     
<script type="text/javascript">
</script>
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
<script type="text/javascript" src="../libraries/validaciones/validaciones.js"></script>
<script type="text/javascript" src="../js/experiencia.js"></script>
</html>