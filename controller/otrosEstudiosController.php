<?php

	require_once("../model/otrosEstudiosModel.php");
	$command = new OtrosEstudios();

	switch ($_REQUEST['command']) {
		case 'insertarOtrosEstudios':
			$arrSentencia = $command->insertarOtrosEstudios($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarOtrosEstudios':
			$arrConsulta = $command->consultarOtrosEstudios($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarOtrosEstudios':
			$arrSentencia = $command->borrarOtrosEstudios($_REQUEST);
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