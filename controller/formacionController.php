<?php

	require_once("../model/formacionModel.php");
	$command = new formacion();

	switch ($_REQUEST['command']) {
		case 'llenarSelect':
			$arrConsulta = $command->llenarSelect($_REQUEST);
			if (COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'insertarFormacion':
			$arrSentencia = $command->insertarFormacion($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarFormacion':
			$arrConsulta = $command->consultarFormacion($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarFormacion':
			$arrSentencia = $command->borrarFormacion($_REQUEST);
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