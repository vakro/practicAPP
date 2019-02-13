<?php 

require_once("../model/loginModel.php");
$command = new login();

switch ($_REQUEST['command']) {
	case 'validarexistenciaUser':
			$arrConsulta = $command->loguin($_REQUEST);
			if (COUNT($arrConsulta)!=0) {

				session_start();
				$_SESSION['id'] = $arrConsulta[0]['id'];
				$_SESSION['user'] = $arrConsulta[0]['username'];
				$_SESSION['name'] = $arrConsulta[0]['name'];
                $_SESSION['email'] = $arrConsulta[0]['email'];

				print_r(1);

			}else{
				print_r(0);
				//No existe el usuario
			}


		break;
	
	default:
		print_r("no se encontro el caso");
		break;
}






?>