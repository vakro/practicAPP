$(document).ready(function(){
	llenarTablaEnviosRealizados();
})


function llenarTablaEnviosRealizados(){
	var parametros = {		
		"command":"consultarEnviosRealizados"
	}

	$.ajax({
		url:"../controller/verEnviosController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';
			//console.log(parsed);
			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+parsed[i]['numero_documento']+"</td>"+
							"<td>"+parsed[i]['nombre_estudiante']+' '+parsed[i]['apellidos_estudiante']+"</td>"+
							"<td>"+parsed[i]['desc_programa']+"</td>"+
							"<td>"+parsed[i]['correo']+"</td>"+
							"<td>"+parsed[i]['semestre']+"</td>"+
							"<td>"+parsed[i]['nombre_empresa']+"</td>"+
							"<td NOWRAP>"+parsed[i]['fecha']+"</td>";
							//"<td>"+"<button class='btn btn-danger btn-sm' >"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+

						if (parsed[i]['desc_estado']=="Enviado") {
							cadena+="<td NOWRAP style='text-align: right;'>"+"<b>"+"<p style='color: gold; display: inline;'>"+parsed[i]['desc_estado']+' '+"</p>"+"</b>"+
										"<button title='cambiar estado' class='btn btn-warning btn-sm' data-toggle='modal' data-target='#modalCambiarEstadoEnvio' onclick='llenarSelectEstadoEnvio("+parsed[i]['id_estado']+", "+parsed[i]['id_registroEnvio']+")'>"+
											"<i class='fa fa-pencil'></i>"+
										"</button>"+"</td>";
						}else if (parsed[i]['desc_estado']=="Contratado") {
							cadena+="<td NOWRAP style='text-align: right;'>"+"<b>"+"<p style='color: green; display: inline;'>"+parsed[i]['desc_estado']+' '+"</p>"+"</b>"+
										"<button title='cambiar estado' class='btn btn-success btn-sm' data-toggle='modal' data-target='#modalCambiarEstadoEnvio' onclick='llenarSelectEstadoEnvio("+parsed[i]['id_estado']+", "+parsed[i]['id_registroEnvio']+")'>"+
											"<i class='fa fa-pencil'></i>"+
										"</button>"+"</td>";
						}else if (parsed[i]['desc_estado']=="Anulado por contratación") {
							cadena+="<td NOWRAP style='text-align: right;'>"+"<b>"+"<p style='color: red; display: inline;'>"+parsed[i]['desc_estado']+' '+"</p>"+"</b>"+
										"<button title='cambiar estado' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#modalCambiarEstadoEnvio' onclick='llenarSelectEstadoEnvio("+parsed[i]['id_estado']+", "+parsed[i]['id_registroEnvio']+")'>"+
											"<i class='fa fa-pencil'></i>"+
										"</button>"+"</td>";
						}else{
							cadena="<td>"+''+"</td>";
						}
						
				cadena+="</tr>";
			}

			$("#tbodyRegistrosEnviados").html(cadena);
			$("#tbodyRegistrosEnviados").prev("thead").find("th").css("background-color", "#0B3861");
			$("#table_envios").DataTable();
		}
	});
}

$("#btnDescargarExcel").click(function(){
	location.href = "../controller/reporteExcelEnviosController.php";
})


function llenarSelectEstadoEnvio(idEstado, idRegistrohidden){
	
	var idSelect = "estadoEnvio";
	var tablaDB = "estados";
	var idCampo = "id"
	var nombreCampo = "desc_estado";
	var foreign_id = 0;
	var whereid = 0;

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
			var cadena="";

			for(var i=0; i<parsed.length; i++){
				cadena+="<option value='"+parsed[i][idCampo]+"'>"+parsed[i][nombreCampo]+"</option>";
			}

			$("#"+idSelect).html(cadena);
			$("#"+idSelect).val(idEstado);
			$("#idRegistro").val(""); //primero setearlo
			$("#idRegistro").val(idRegistrohidden); //despues darle valor
		}
	})
}

$("#modalCambiarEstadoEnvio").on('hidden.bs.modal', function () {
    $("#idRegistro").val("");
});

$("#actualizarEstado").click(function(){
	
	var idRegistro = $("#idRegistro").val();
	var estadoDeRegistro = $("#estadoEnvio").val();

	var parametros = {
		"idRegistro":idRegistro,
		"estadoDeRegistro":estadoDeRegistro,
		"command":"cambiarEstadoEnvio"
	}


	$.ajax({
		url:"../controller/verEnviosController.php",
		data: parametros,
		success:function(data){

			if (data==1) {
				Swal.fire(
				  'Actualizado correctamente!',
				  'El registro ha sido actualizado',
				  'success'
				)
			}else{
				Swal.fire(
				  'Oops!',
				  'Acabas de seleccionar el mismo estado',
				  'info'
				)
			}

			llenarTablaEnviosRealizados();
		}
	});

});