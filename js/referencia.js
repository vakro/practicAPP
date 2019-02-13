$(document).ready(function(){
	llenarSelect("ciudad_ref", "ciudad", "id", "nombre_ciudad", 0, 0);
	listarReferencias();	
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
		url:"../controller/referenciaController.php",
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
$("#formReferencia").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR REFERENCIA
$("#btnGuardarReferencia").click(function(){

    if (
		validarCampoInput(nombre_referencia,'^[a-zA-Z ñáéíóú]{3,80}$',1)== false ||
		validarCampoInput(cargo_referencia,'^[a-zA-Z ñáéíóú0-9]{3,50}$',1)== false ||
		validarCampoInput(numero_referencia,'^[0-9]{10}$',1)== false ||
		validarCampoInput(empresa_referencia,'^[a-zA-Z0-9 ñáéíóú/-]{3,50}$',1)== false ||
		validarCampoSelect(ciudad_ref,1)== false 	
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la informacion!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{

	//input
	var inputnombre_referencia = $("#nombre_referencia").val();
	var inputcargo_referencia = $("#cargo_referencia").val();
	var inputnumero_referencia = $("#numero_referencia").val();
	var inputempresa_referencia = $("#empresa_referencia").val();
	var inputid_estudiante = $("#id_estudiante").val();

	//select
	var selectciudad_ref = $("#ciudad_ref").val();

	var parametros = {
		"inputnombre_referencia":inputnombre_referencia,
		"inputcargo_referencia":inputcargo_referencia,
		"inputnumero_referencia":inputnumero_referencia,
		"inputempresa_referencia":inputempresa_referencia,
		"inputid_estudiante":inputid_estudiante,		
		"selectciudad_ref":selectciudad_ref,		
		"command":"insertarReferencia"
	}

	$.ajax({
		url:"../controller/referenciaController.php",
		data: parametros,
		success:function(data){
		
			if (data!=0) {
				listarReferencias();

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
    $("#nombre_referencia").val("");
    $("#cargo_referencia").val("");
    $("#numero_referencia").val("");
    $("#empresa_referencia").val("");
    $("#ciudad_ref").val(0);
} 


function listarReferencias(){

	var inputid_estudiante = $("#id_estudiante").val();

	var parametros = {
		"inputid_estudiante":inputid_estudiante,
		"command":"consultarReferencia"
	}

	$.ajax({
		url:"../controller/ReferenciaController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+parsed[i]['nombre_completo']+"</td>"+
							"<td>"+parsed[i]['cargo']+"</td>"+
							"<td>"+parsed[i]['numero_contacto']+"</td>"+
							"<td>"+parsed[i]['empresa']+"</td>"+
							"<td>"+parsed[i]['nombre_ciudad']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarReferencia("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyReferencia").html(cadena);
		}
	});

}

function borrarReferencia(id){
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

	  	var idReferencia = id;
	  	var parametros = {
	  		"idReferencia":idReferencia,
	  		"command":"borrarReferencia"
	  	}

	  	$.ajax({
	  		url:"../controller/referenciaController.php",
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

				listarReferencias();
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

//GENERAR PDF
$("#btnGenerarPDF").click(function(){
	var idEstudiante = $("#id_estudiante").val();

	location.href = "generarPdf.php?idEst="+idEstudiante+"";

});

$(nombre_referencia).keyup(function(event){validarCampoInput(nombre_referencia,'^[a-zA-Z ñáéíóú]{3,80}$',1)});
$(cargo_referencia).keyup(function(event){validarCampoInput(cargo_referencia,'^[a-zA-Z ñáéíóú0-9]{3,50}$',1)});
$(numero_referencia).keyup(function(event){validarCampoInput(numero_referencia,'^[0-9]{10}$',1)});
$(empresa_referencia).keyup(function(event){validarCampoInput(empresa_referencia,'^[a-zA-Z0-9 ñáéíóú/-]{3,50}$',1)});
$(ciudad_ref).change(function(){validarCampoSelect(ciudad_ref,1)});