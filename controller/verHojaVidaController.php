<?php

	require_once("../model/verHojaVidaModel.php");
	$command = new hojadevida();

	switch ($_REQUEST['command']) {
		
		case 'llenarTablaHojadeVida':
			$arrConsulta = $command->listarTablaHojasdeVida();
			if ($arrConsulta!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;
		
		default:
			print_r("no se encontro el caso");
			break;
	}

?>