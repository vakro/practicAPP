<?php

	require_once("../model/personalModel.php");
	$command = new personal();

	switch ($_REQUEST['command']) {
		case 'llenarSelect':
			$arrConsulta = $command->llenarSelect($_REQUEST);
			if (COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'insertarInfoPersonal':
			$arrSentencia = $command->insertarInfoPersonal($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'buscarDocumento':
			$arrConsulta = $command->buscarDocumento($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'actualizarInfoPersonal':
			$arrConsulta = $command->actualizarInfoPersonal($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
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