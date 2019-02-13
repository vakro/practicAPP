$(document).ready(function(){
	llenarSelect("empresa", "empresa", "id", "nombre_empresa", 0, 0);
});

$("#formRegistroEnvio").submit(function(evt){
	evt.preventDefault();
})

$("#documento").keyup(function(){
	var documentoValue = $("#documento").val();

	if (documentoValue.length==0) {
		console.log("vacio");
	}else{

		var parametros = {
			"documento":documentoValue,
			"command":"buscarDocumento"
		}

		$.ajax({
			url:"../controller/registroEnvioController.php",
			data: parametros,
			success:function(data){
				//console.log(data);
				var parsed = "";

				if (data==0) {
					$("#nombre").val("");
					$("#idEst").val("");
				}else{
					parsed = JSON.parse(data);
					var idEst = parsed[0]['id'];
					var nombre = parsed[0]['nombre_estudiante']+" "+parsed[0]['apellidos_estudiante'];
					$("#nombre").val(nombre);
					$("#idEst").val(idEst);
				}
			}
		})
	}
})

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

$("#btnGuardarEnvio").click(function(){

	//input
	var inputhiddenidEst = $("#idEst").val();
	var inputfecha_envio = $("#fecha_envio").val();

	//select
	var selectempresa = $("#empresa").val();

	var parametros = {
		"inputhiddenidEst":inputhiddenidEst,
		"inputfecha_envio":inputfecha_envio,
		"selectempresa":selectempresa,
		"command":"guardarEnvio"
	}

	$.ajax({
		url:"../controller/registroEnvioController.php",
		data: parametros,
		success:function(data){
			if (data!=0) {

				Swal.fire(
				  'Insertado Correctamente!',
				  'El registro ha sido guardado correctamente!',
				  'success'
				)

				limpiar();
			}else{
				Swal.fire(
				  'Ha ocurrido un error',
				  'El registro no ha sido guardado!',
				  'error'
				)
			}
		}
	})
});

function limpiar(){
	$("#idEst").val("");
	$("#documento").val("");
	$("#nombre").val("");
	$("#empresa").val(0);
	$("#fecha_envio").val("");
}