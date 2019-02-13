$(document).ready(function(){
	llenarSelect("nivel_estudio", "nivel_estudios", "id", "desc_nivel_estudio", 0, 0);
	listarFormaciones();	
});

function llenarSelect(idSelect, tablaDB, idCampo, nombreCampo, foreign_id,whereid){

	var parametros = {
		"tablaDB":tablaDB,
		"idCampo":idCampo,
		"nombreCampo":nombreCampo,
		"foreign_id":foreign_id,
		"condicion":whereid,
		"command":"llenarSelect"
	}

	$.ajax({
		url:"../controller/formacionController.php",
		data: parametros,
		success:function(data){

			var parsed = JSON.parse(data);
			var cadena="<option value='0'>"+'-- Seleccione --'+"</option>";

			for(var i=0; i<parsed.length; i++){
				cadena+="<option value='"+parsed[i][idCampo]+"'>"+parsed[i][nombreCampo]+"</option>";
			}

			$("#"+idSelect).html(cadena);
		}
	})

}

//Cancelar submit del form
$("#formFormacion").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR FORMACION
$("#btnGuardarFormacion").click(function(){

	if (
			validarCampoSelect(nivel_estudio,1)== false ||
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
		var inputfecha_formacion = $("#fecha_formacion").val();
		var inputid_estudiante = $("#id_estudiante").val();

		//select
		var selectnivel_estudio = $("#nivel_estudio").val();

		var parametros = {
			"inputinstitucion":inputinstitucion,
			"inputtitulo":inputtitulo,
			"inputfecha_formacion":inputfecha_formacion,
			"inputid_estudiante":inputid_estudiante,		
			"selectnivel_estudio":selectnivel_estudio,		
			"command":"insertarFormacion"
		}

		$.ajax({
			url:"../controller/formacionController.php",
			data: parametros,
			success:function(data){
			
				if (data!=0) {
					listarFormaciones();

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
    $("#nivel_estudio").val(0);
    $("#institucion").val("");
    $("#titulo").val("");
    $("#fecha_formacion").val("");
} 


function listarFormaciones(){

	var inputid_estudiante = $("#id_estudiante").val();

	var parametros = {
		"inputid_estudiante":inputid_estudiante,
		"command":"consultarFormacion"
	}

	$.ajax({
		url:"../controller/formacionController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+parsed[i]['desc_nivel_estudio']+"</td>"+
							"<td>"+parsed[i]['institucion']+"</td>"+
							"<td>"+parsed[i]['titulo']+"</td>"+
							"<td>"+parsed[i]['fecha_formacion']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarFormacion("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyFormacion").html(cadena);
		}
	});

}

function borrarFormacion(id){
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

	  	var idFormacion = id;
	  	var parametros = {
	  		"idFormacion":idFormacion,
	  		"command":"borrarFormacion"
	  	}

	  	$.ajax({
	  		url:"../controller/formacionController.php",
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

				listarFormaciones();
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

$(nivel_estudio).change(function(){validarCampoSelect(nivel_estudio,1)});
$(institucion).keyup(function(event){validarCampoInput(institucion,'^[a-zA-Z ñáéíóú]{11,50}$',1)});
$(titulo).keyup(function(event){validarCampoInput(titulo,'^[a-zA-Z ñáéíóú]{11,150}$',1)});