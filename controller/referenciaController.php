<?php

	require_once("../model/referenciaModel.php");
	$command = new referencia();

	switch ($_REQUEST['command']) {
		case 'llenarSelect':
			$arrConsulta = $command->llenarSelect($_REQUEST);
			if (COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'insertarReferencia':
			$arrSentencia = $command->insertarReferencia($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarReferencia':
			$arrConsulta = $command->consultarReferencia($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarReferencia':
			$arrSentencia = $command->borrarReferencia($_REQUEST);
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