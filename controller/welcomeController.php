<?php 

	switch ($_REQUEST['command']) {
		case 'logout':
			session_start();
			session_destroy();
			print_r(0);
			break;
		
		default:
			print_r("no se encontro el caso");
			break;
	}
?>