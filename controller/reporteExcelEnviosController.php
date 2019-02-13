<?php

	header('Content-type: application/xls');
   	header('Content-Disposition: attachment; filename=reporte.xls');
	require_once("../model/verEnviosModel.php");
	
	$command = new registrosEnviados();
	$dataEnvios = $command->consultarEnviosRealizados();
?>

<meta charset="utf-8">
<table border="1">    
       <tr>
          <th>DOCUMENTO</th>
          <th>NOMBRES</th>
          <th>APELLIDOS</th>
          <th>PROGRAMA</th>
          <th>CORREO</th>
          <th>SEMESTRE</th>
          <th>EMPRESA</th>
          <th>FECHA ENVIO</th>
          <th>ESTADO</th>
        </tr>      
        
        <?php 
        	for ($i=0; $i < COUNT($dataEnvios) ; $i++) { 
        ?>

      	<tr>
	        <td><?php echo $dataEnvios[$i]['numero_documento']; ?></td>
	        <td><?php echo $dataEnvios[$i]['nombre_estudiante']; ?></td>
	        <td><?php echo $dataEnvios[$i]['apellidos_estudiante']; ?></td>
	        <td><?php echo $dataEnvios[$i]['desc_programa']; ?></td>
	        <td><?php echo $dataEnvios[$i]['correo']; ?></td>
	        <td><?php echo $dataEnvios[$i]['semestre']; ?></td>
	        <td><?php echo $dataEnvios[$i]['nombre_empresa']; ?></td>
	        <td><?php echo $dataEnvios[$i]['fecha']; ?></td>
	        <td><?php echo $dataEnvios[$i]['desc_estado']; ?></td>
     	</tr>       

        <?php
        	}
    	?>
 </table> 