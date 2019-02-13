function redireccionar(){
			location.href="../views/welcome.php";
		}
//Cancelar submit del form
$("#formUsuario").submit(function(evt){
	evt.preventDefault();
})

//ACTUALIZAR INFORMACION
$("#btnActualizarUsuario").click(function(){

	if (
			validarCampoInput(password,'^(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$',1)== false 
			
		) 
	{
		Swal.fire(
		  'No se ha podido actualizar!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{

		var id = $("#id").val();	
		var inputpassword = $("#password").val();
		
		var parametros = {
			"id":id,			
			"inputpassword":inputpassword,
			
			"command":"actualizarUsuario"
		}

		$.ajax({
			url:"../controller/usuarioController.php",
			data: parametros,
			success:function(data){
				if (data!=0) {
					Swal.fire({
					  title: 'Genial!',
					  html: 'Constraseña actualizada con exito!',
					  type: 'success',
					  onClose: redireccionar
					})
				}else{
					Swal.fire(
					  'Oops!',
					  'No fue posible guardar su informacion',
					  'error'
					)
				}
			}
		})

	}

})
$(password).keyup(function(event){validarCampoInput(password,'^(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$',1)});
                                                               
                                                             