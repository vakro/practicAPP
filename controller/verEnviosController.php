<?php

	require_once("../model/verEnviosModel.php");
	$command = new registrosEnviados();

	switch ($_REQUEST['command']) {
		
		case 'consultarEnviosRealizados':
			$arrConsulta = $command->consultarEnviosRealizados();
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'cambiarEstadoEnvio':
			$arrSentencia = $command->cambiarEstadoEnvio($_REQUEST);
			if(COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;
		
		default:
			print_r("no se encontro el caso");
			break;
	}
?>