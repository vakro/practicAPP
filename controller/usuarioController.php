<?php

	require_once("../model/usuarioModel.php");
	$command = new usuario();

	switch ($_REQUEST['command']) {		

		case 'insertarUsuario':
			$arrSentencia = $command->insertarUsuario($_REQUEST);
			if (COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'consultarUsuario':
			$arrConsulta = $command->consultarUsuario($_REQUEST);
			if(COUNT($arrConsulta)!=0) {
				print_r(json_encode($arrConsulta));
			}else{
				print_r(0);
			}
			break;

		case 'borrarUsuario':
			$arrSentencia = $command->borrarUsuario($_REQUEST);
			if(COUNT($arrSentencia)!=0) {
				print_r(json_encode($arrSentencia));
			}else{
				print_r(0);
			}
			break;

		case 'actualizarUsuario':
			$arrSentencia = $command->actualizarUsuario($_REQUEST);
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