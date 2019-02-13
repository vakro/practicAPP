<?php

	require_once("../model/empresaModel.php");
	$command = new empresa();

	switch ($_REQUEST['command']) {		

		case 'insertarEmpresa':
			$arrSentencia = $command->insertarEmpresa($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarEmpresa':
			$arrConsulta = $command->consultarEmpresa($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarEmpresa':
			$arrSentencia = $command->borrarEmpresa($_REQUEST);
			if(COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'buscarEmpresa':
			$arrConsulta = $command->buscarEmpresa($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;
			
		case 'actualizarEmpresa':
			$arrSentencia = $command->actualizarEmpresa($_REQUEST);
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