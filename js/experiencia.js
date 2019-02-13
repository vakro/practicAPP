$(document).ready(function(){
	llenarSelect("ciudad_exp", "ciudad", "id", "nombre_ciudad", 0, 0);
	listarExperiencia();	
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
$("#formExperiencia").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR EXPERIENCIA
$("#btnGuardarExperiencia").click(function(){


	if (
			validarCampoSelect(ciudad_exp,1) == false ||
			validarCampoInput(nombre_empresa,'^[a-zA-Z ñáéíóú]{3,60}$',1) == false ||
            validarCampoInput(cargo,'^[a-zA-Z ñáéíóú]{3,60}$',1) == false
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la información!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{


	//input
	var inputnombre_empresa = $("#nombre_empresa").val();
	var inputcargo = $("#cargo").val();
	var inputfecha_inicio_exp = $("#fecha_inicio_exp").val();
	var inputfecha_fin_exp = $("#fecha_fin_exp").val();
	var inputid_estudiante = $("#id_estudiante").val();

	//select
	var selectciudad_exp = $("#ciudad_exp").val();

	//textarea
	var textareadesc_actividades = $("#desc_actividades").val();

	var parametros = {
		"selectciudad_exp":selectciudad_exp,
		"inputnombre_empresa":inputnombre_empresa,
		"inputcargo":inputcargo,
		"inputfecha_inicio_exp":inputfecha_inicio_exp,
		"inputfecha_fin_exp": inputfecha_fin_exp,
		"textareadesc_actividades":textareadesc_actividades,
		"inputid_estudiante":inputid_estudiante,				
		"command":"insertarExperiencia"
	}

	$.ajax({
		url:"../controller/experienciaController.php",
		data: parametros,
		success:function(data){
		
			if (data!=0) {
				listarExperiencia();

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
    $("#ciudad_exp").val(0);
    $("#nombre_empresa").val("");
    $("#cargo").val("");
    $("#fecha_inicio_exp").val("");
    $("#fecha_fin_exp").val("");
    $("#desc_actividades").val("");
} 


function listarExperiencia(){

	var inputid_estudiante = $("#id_estudiante").val();

	var parametros = {
		"inputid_estudiante":inputid_estudiante,
		"command":"consultarExperiencia"
	}

	$.ajax({
		url:"../controller/experienciaController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+parsed[i]['nombre_ciudad']+"</td>"+
							"<td>"+parsed[i]['nombre_empresa']+"</td>"+
							"<td>"+parsed[i]['cargo']+"</td>"+
							"<td>"+parsed[i]['fecha_inicio_exp']+"</td>"+
							"<td>"+parsed[i]['fecha_fin_exp']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarExperiencia("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyExperiencia").html(cadena);
		}
	});

}

function borrarExperiencia(id){
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

	  	var idExperiencia = id;
	  	var parametros = {
	  		"idExperiencia":idExperiencia,
	  		"command":"borrarExperiencia"
	  	}

	  	$.ajax({
	  		url:"../controller/experienciaController.php",
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

				listarExperiencia();
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

$(ciudad_exp).change(function(){validarCampoSelect(ciudad_exp,1)});
$(nombre_empresa).keyup(function(event){validarCampoInput(nombre_empresa,'^[a-zA-Z ñáéíóú]{3,60}$',1)});
$(cargo).keyup(function(event){validarCampoInput(cargo,'^[a-zA-Z ñáéíóú]{3,60}$',1)});