$(document).ready(function(){
	listarOtrosEstudios();	
});

//Cancelar submit del form
$("#formOtrosEstudios").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR OTROS ESTUDIOS
$("#btnGuardarOtros").click(function(){

	if (
			validarCampoInput(institucion,'^[a-zA-Z ñáéíóú]{11,50}$',1)== false ||
			validarCampoInput(titulo,'^[a-zA-Z ñáéíóú]{11,150}$',1)== false
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la informacion!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{

		//input
		var inputinstitucion = $("#institucion").val();
		var inputtitulo = $("#titulo").val();
		var inputfecha_estudios = $("#fecha_estudios").val();
		var inputid_estudiante = $("#id_estudiante").val();

		var parametros = {
			"inputinstitucion":inputinstitucion,
			"inputtitulo":inputtitulo,
			"inputfecha_estudios":inputfecha_estudios,
			"inputid_estudiante":inputid_estudiante,		
			"command":"insertarOtrosEstudios"
		}

		$.ajax({
			url:"../controller/otrosEstudiosController.php",
			data: parametros,
			success:function(data){
			
				if (data!=0) {
					listarOtrosEstudios();

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
    $("#institucion").val("");
    $("#titulo").val("");
    $("#fecha_estudios").val("");
} 


function listarOtrosEstudios(){ 

	var inputid_estudiante = $("#id_estudiante").val();

	var parametros = {
		"inputid_estudiante":inputid_estudiante,
		"command":"consultarOtrosEstudios"
	}

	$.ajax({
		url:"../controller/otrosEstudiosController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+parsed[i]['institucion']+"</td>"+
							"<td>"+parsed[i]['titulo']+"</td>"+
							"<td>"+parsed[i]['fecha_estudios']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarOtrosEstudios("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyOtrosEstudios").html(cadena);
		}
	});

}

function borrarOtrosEstudios(id){
	const swalWithBootstrapButtons = Swal.mixin({
	  confirmButtonClass: 'btn btn-success',
	  cancelButtonClass: 'btn btn-danger',
	  buttonsStyling: false,
	})

	swalWithBootstrapButtons.fire({
	  title: 'Estas seguro?',
	  text: "Deseas borrar el registro!",
	  type: 'warning',
	  showCancelButton: true,
	  confirmButtonText: 'Si, borrarlo',
	  cancelButtonText: 'No, cancelar!',
	  reverseButtons: true
	}).then((result) => {
	  if (result.value) {

	  	var idOtroEstudio = id;
	  	var parametros = {
	  		"idOtroEstudio":idOtroEstudio,
	  		"command":"borrarOtrosEstudios"
	  	}

	  	$.ajax({
	  		url:"../controller/otrosEstudiosController.php",
			data: parametros,
			success:function(data){

				if (data!=0 && data!=-1) {
					swalWithBootstrapButtons.fire(
				      'Borrado!',
				      'Se ha eliminado el registro Correctamente.',
				      'success'
				    )

				}else{
					swalWithBootstrapButtons.fire(
				      'error!',
				      'No ha sido posible borrar el registro.',
				      'error'
				    )
				}

				listarOtrosEstudios();
			}
	  	})

	  } else if (
	    // Read more about handling dismissals
	    result.dismiss === Swal.DismissReason.cancel
	  ) {
	    swalWithBootstrapButtons(
	      'Cancelado',
	      'Se ha candelado la orden',
	      'info'
	    )
	  }
	})
}

$(institucion).keyup(function(event){validarCampoInput(institucion,'^[a-zA-Z ñáéíóú]{11,50}$',1)});
$(titulo).keyup(function(event){validarCampoInput(titulo,'^[a-zA-Z ñáéíóú]{11,150}$',1)});