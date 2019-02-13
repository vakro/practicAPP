<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
</head>


<script type="text/javascript">
		function redireccionar(){
			location.href="../views/registroOtrosDatos.php?idEst=<?=$_POST['id_estudiante']?>";
			                            
		}
</script>


<?php
    
	require_once('../model/guardarImagenModel.php');
	$data = new guardarImagen();


	$idEst = $_POST['id_estudiante'];


	//validar si el estudiante ya tiene foto.
	$arrConsulta = $data->consultarImagen($idEst);
	   if(COUNT($arrConsulta)!=0){
            
                $nombreEstudiante= $arrConsulta[0]['nombre_estudiante'].' '.$arrConsulta[0]['apellidos_estudiante'];
                
                $ruta = 'C:/xampp/htdocs/practicApp/files/';
				$imagenRuta = $ruta . basename($_FILES['imagen']['name']);
				$imagenNombre = $_FILES['imagen']['name'];
				$imagenTamano = $_FILES['imagen']['size'];
                
                 if($imagenTamano > 2097152){
			        echo ".";

					        ?>
								<script type="text/javascript">

									Swal.fire({
									  title: 'Oops!',
									  html:'La foto debe pesar menos de 2MB',
									  type: 'error',
									  onClose: redireccionar
									})
								</script>
							 <?php

		       }else{
		       	     
		       	         if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenRuta)) {
							   	 

						    // Si la imagen se cargo de forma correcta, entonces actualiza en la base de datos.

									$arrSentencia = $data->actualizarImagen($imagenNombre, $imagenRuta, $idEst);

									    if (COUNT($arrSentencia)!=0) {			    	
									    	echo ".";
									    				    	
						                   ?>
												<script type="text/javascript">

													Swal.fire({
													  title: 'Excelente!',
													  html: 'Tú foto ha sido actualizada',
													  type: 'success',
													  onClose: redireccionar
													})
												</script>
											 <?php
									    			 
									   
										}else{
											 
							                  ?>
												<script type="text/javascript">

													Swal.fire({
													  title: 'Oops!',
													  html: 'Ha ocurrido un error al actualizar la foto',
													  type: 'error',
													  onClose: redireccionar
													})
												</script>
											 <?php
										 }
								   

							}else{
							    // "No se pudo actualizar la imagen"
							?>

							<script type="text/javascript">

								Swal.fire({
								  title: 'Oops!',
								  html: 'Ha ocurrido un error al cargar la foto',
								  type: 'error',
								  onClose: redireccionar
								})
							</script>
						    <?php

						    }
		       }

                

                


	   } else{ 

		   	    $ruta = 'C:/xampp/htdocs/practicApp/files/';
				$imagenRuta = $ruta . basename($_FILES['imagen']['name']);
				$imagenNombre = $_FILES['imagen']['name'];
				$imagenTamano = $_FILES['imagen']['size'];
				$imagenValida = false;

			
	   	   
	   	   //valida el tamaño de la imagen, debe pesar menos de 2MB
		   	   	if($imagenTamano > 2097152){
			        echo ".";

					        ?>
								<script type="text/javascript">

									Swal.fire({
									  title: 'Oops!',
									  html:'La foto debe pesar menos de 2MB',
									  type: 'error',
									  onClose: redireccionar
									})
								</script>
							 <?php

		       }else{			      
                        
							if (move_uploaded_file($_FILES['imagen']['tmp_name'], $imagenRuta)) {
							   	 

						    // Si la imagen se cargo de forma correcta, entonces insertas en la base de datos.

									$arrSentencia = $data->insertarImagen($imagenNombre, $imagenRuta, $idEst);

									    if (COUNT($arrSentencia)!=0) {			    	
									    	echo ".";
									    				    	
						                   ?>
												<script type="text/javascript">

													Swal.fire({
													  title: 'Excelente!',
													  html: 'Tú foto ha sido guardada',
													  type: 'success',
													  onClose: redireccionar
													})
												</script>
											 <?php
									    			 
									   
										}else{
											 
							                  ?>
												<script type="text/javascript">

													Swal.fire({
													  title: 'Oops!',
													  html: 'Ha ocurrido un error al guardar la foto',
													  type: 'error',
													  onClose: redireccionar
													})
												</script>
											 <?php
										 }
								   

							}else{
							    // "No se pudo guardar la imagen"
							?>

							<script type="text/javascript">

								Swal.fire({
								  title: 'Oops!',
								  html: 'Ha ocurrido un error al cargar la foto',
								  type: 'error',
								  onClose: redireccionar
								})
							</script>
						    <?php

						    }


		            }
	   	   }


//echo 'Más información de depuración:';
//print_r($_FILES);  
?>

</html>