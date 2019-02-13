<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@7.29.1/dist/sweetalert2.all.min.js"></script>
</head>
<body background="../img/fondoprincipal.png" style="background-size: cover;">

<script type="text/javascript">
		function redireccionar(){
			location.href="../views/login.php";
		}
</script>
	<?php

require_once("../model/recuperarContrasenaModel.php");
$conne = new correoElectronico();
$correo = $_POST['correo'];

$arrConsulta = $conne->validarCorreoElectronico($correo);

if (COUNT($arrConsulta)!=0) {
	
	$nombreDestinatario = $arrConsulta[0]['name'];
	$correoDestino = $arrConsulta[0]['email'];
	$user = $arrConsulta[0]['username'];
	$pass = $arrConsulta[0]['password'];
	
	require '../libraries/phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;
	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';

	$encabezado = 'Usted ha solicitado recordar su contraseña para ingresar a la aplicación <br><b>USUARIO: </b>'.$user.'<br><b>CONTRASEÑA: </b>'.$pass;
	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'practicappuniajc@gmail.com';                 // SMTP username
	$mail->Password = 'proyecto2019';                           // SMTP password
	//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 25;                                    // TCP port to connect to

	$mail->setFrom('practicappuniajc@gmail.com', 'Support team');
	$mail->addAddress($correoDestino, $nombreDestinatario);     // Add a recipient
	//$mail->addAddress('ellen@example.com');               // Name is optional
	//$mail->addReplyTo('info@example.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Solicitud para recordar Clave de Acceso';
	$mail->Body    = $encabezado;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {

		//Inicio mensaje de error
?>

	<script type="text/javascript">
		
		var errorEncabezado = "<?php echo 'El mensaje no fue enviado.'; ?>";
		var errorCuerpo = "<?php echo 'Mailer Error: ' . $mail->ErrorInfo; ?>";
		
		console.log(errorEncabezado);
		console.log(errorCuerpo);

		Swal.fire(
		  'Se ha presentado un fallo inesperado',
		  'contactese con el equipo de desarrollo',
		  'error'
		)

	</script>

<?php
		//Fin mensaje de error

	} else {

		//Inicio de mensaje de exito
?>
	<script type="text/javascript">

		var correo = "<?php echo '<b>'.$correoDestino.'</b>' ?>";

		Swal.fire({
		  title: 'Revisa tu correo electronico!',
		  html: 'Se ha enviado el usuario y la contraseña a '+correo,
		  type: 'success',
		  onClose: redireccionar
		})

	</script>

<?php
		//Fin de mensaje de exito
	}


}else{

	// "El correo no pertenece a la app"
?>

<script type="text/javascript">

	var correo= "<?php echo '<b>'.$correo.'</b>' ?>";

	Swal.fire({
	  title: 'Oops!',
	  html: 'El correo '+correo+' no se encuentra registrado en nuestra base de datos, se te redireccionara nuevamente al login',
	  type: 'error',
	  onClose: redireccionar
	})
</script>


<?php

}


?>

</body>
</html>


