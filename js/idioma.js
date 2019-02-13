$(document).ready(function(){
	llenarSelect("idioma", "desc_idiomas", "id", "nombre_idioma", 0, 0);
	llenarSelect("desc_nivel", "nivel_idioma", "id", "desc_nivel", 0, 0);
	listarIdiomas();	
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
		url:"../controller/idiomaController.php",
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
$("#formIdiomas").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR IDIOMAS
$("#btnGuardarIdioma").click(function(){

	if (
			validarCampoSelect(idioma,1)== false ||
			validarCampoSelect(desc_nivel,1)== false
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la información!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{

		//input
		var inputid_estudiante = $("#id_estudiante").val();

		//select
		var selectidioma = $("#idioma").val();
		var selectdesc_nivel = $("#desc_nivel").val();

		var parametros = {
			"inputid_estudiante":inputid_estudiante,		
			"selectidioma":selectidioma,
			"selectdesc_nivel":selectdesc_nivel,			
			"command":"insertarIdioma"
		}

		$.ajax({
			url:"../controller/idiomaController.php",
			data: parametros,
			success:function(data){
			
				if (data!=0) {
					listarIdiomas();

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
    $("#idioma").val(0);
    $("#desc_nivel").val(0);
} 


function listarIdiomas(){

	var inputid_estudiante = $("#id_estudiante").val();

	var parametros = {
		"inputid_estudiante":inputid_estudiante,
		"command":"consultarIdioma"
	}

	$.ajax({
		url:"../controller/idiomaController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+parsed[i]['nombre_idioma']+"</td>"+
							"<td>"+parsed[i]['desc_nivel']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarIdioma("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyIdiomas").html(cadena);
		}
	});

}

function borrarIdioma(id){
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

	  	var idIdioma = id;
	  	var parametros = {
	  		"idIdioma":idIdioma,
	  		"command":"borrarIdioma"
	  	}

	  	$.ajax({
	  		url:"../controller/idiomaController.php",
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

				listarIdiomas();
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

$(idioma).change(function(){validarCampoSelect(idioma,1)});
$(desc_nivel).change(function(){validarCampoSelect(desc_nivel,1)});