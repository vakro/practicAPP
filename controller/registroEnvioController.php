<?php

	require_once("../model/registroEnvioModel.php");
	$command = new envio();

	switch ($_REQUEST['command']) {
		
		case 'buscarDocumento':
			$arrConsulta = $command->buscarDocumento($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'guardarEnvio':
			$arrSentecia = $command->guardarEnvio($_REQUEST);
			if(COUNT($arrSentecia)!=0) {
				print_r(json_encode($arrSentecia));
			}else{
				print_r(0);
			}
			break;
		
		default:
			print_r("no se encontro el caso");
			break;
	}
?>