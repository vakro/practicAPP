<?php

	require_once("../model/experienciaModel.php");
	$command = new experiencia();

	switch ($_REQUEST['command']) {
		case 'llenarSelect':
			$arrConsulta = $command->llenarSelect($_REQUEST);
			if (COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'insertarExperiencia':
			$arrSentencia = $command->insertarExperiencia($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarExperiencia':
			$arrConsulta = $command->consultarExperiencia($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarExperiencia':
			$arrSentencia = $command->borrarExperiencia($_REQUEST);
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