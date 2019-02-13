
//Cancelar submit del form
$("#formUsuario").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR USUARIO
$("#btnGuardarUsuario").click(function(){

	        if (
					//validarCampoInput(name,'^[a-zA-Z ]{6,50}$',1)== false ||
					validarCampoInput(username,'^[a-zA-Z0-9 ñáéíóú]{6,20}$',1)== false ||
					validarCampoInput(email,'^[a-zA-Z0-9-_.]{5,40}?\@(gmail|hotmail|admon.uniajc|outlook)\.(com|es|com.ar|edu.co)$',1)== false ||
					validarCampoInput(password,'^(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$',1)== false

			   ) 
			{
				Swal.fire(
				  'No se ha podido guardar la información!',
				  'Verifica nuevamente tu datos',
				  'error'
				)
			}else{

   			//input
			var inputname = $("#name").val();
			var inputusername = $("#username").val();
			var inputemail = $("#email").val();
			var inputpassword = $("#password").val();

			var parametros = {
				"inputname":inputname,
				"inputusername":inputusername,
				"inputemail":inputemail,
				"inputpassword":inputpassword,		
				"command":"insertarUsuario"
			}

			$.ajax({
				url:"../controller/usuarioController.php",
				data: parametros,
				success:function(data){
				
					if (data!=0) {
						
						Swal.fire(
						  'Insertado Correctamente!',
						  '',
						  'success'
						)
					}else{
						Swal.fire(
						  'Ha ocurrido un error',
						  '',
						  'error'
						)
					}

					limpiar()
				}
			})
		}	
		
});

function limpiar(){
    $("#name").val("");
    $("#username").val("");
    $("#email").val("");
    $("#password").val("");
} 

$(name).keyup(function(event){validarCampoInput(name,'^[a-zA-Z ]{6,50}$',1)});
$(username).keyup(function(event){validarCampoInput(username,'^[a-zA-Z0-9 ñáéíóú]{6,20}$',1)});
$(email).keyup(function(event){validarCampoInput(email,'^[a-zA-Z0-9-_.]{5,40}?\@(gmail|hotmail|admon.uniajc|outlook)\.(com|es|com.ar|edu.co)$',1)});
$(password).keyup(function(event){validarCampoInput(password,'^(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,16})$',1)});