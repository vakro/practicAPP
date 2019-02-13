<?php

	require_once("../model/idiomaModel.php");
	$command = new idioma();

	switch ($_REQUEST['command']) {
		case 'llenarSelect':
			$arrConsulta = $command->llenarSelect($_REQUEST);
			if (COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'insertarIdioma':
			$arrSentencia = $command->insertarIdioma($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarIdioma':
			$arrConsulta = $command->consultarIdioma($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarIdioma':
			$arrSentencia = $command->borrarIdioma($_REQUEST);
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