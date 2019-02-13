$("#formInciarsesion").submit(function(evt){
	evt.preventDefault();
});


$("#btninciarsesion").click(function(){
	
	var username = $("#username").val();
	var password = $("#password").val();


	var parametros = {
		"username":username,
		"password":password,
		"command":"validarexistenciaUser"
	}

	$.ajax({
		url:"../controller/loginController.php",
		data: parametros,
		success:function(data){

			if (data==0) {
				const toast = Swal.mixin({
					  toast: true,
					  position: 'top-end',
					  showConfirmButton: false,
					  timer: 3000
					});

				toast({
				  type: 'error',
				  title: 'Usuario o contraseña incorrectos'
				})
			}else if(data==1){
				const toast = Swal.mixin({
					  toast: true,
					  position: 'top-end',
					  showConfirmButton: false,
					  timer: 3000
					});

				toast({
				  type: 'success',
				  title: 'Logueado Correctamente'
				})
			}


			setInterval(function(){ 
				location.href = "welcome.php";
			}, 4000);
		}
	})






});