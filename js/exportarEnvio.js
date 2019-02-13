
header('Content-type: application/xls');
header('Content-Disposition: attachment; filename=reporte.xls');


$("#btnDescargarExcel").click(function(){

	var parametros = {		
		"command":"consultarEnviosRealizados"
	}

	$.ajax({
		url:"../controller/verEnviosController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			"<table border='1'>"+
			   "<tr>"

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+parsed[i]['numero_documento']+"</td>"+
							"<td>"+parsed[i]['nombre_estudiante']+' '+parsed[i]['apellidos_estudiante']+"</td>"+
							"<td>"+parsed[i]['desc_programa']+"</td>"+
							"<td>"+parsed[i]['correo']+"</td>"+
							"<td>"+parsed[i]['semestre']+"</td>"+
							"<td>"+parsed[i]['nombre_empresa']+"</td>"+
							"<td>"+parsed[i]['fecha']+"</td>";
							"<td>"+parsed[i]['desc_estado']+"</td>"+
				      "</tr>";						
			}
			
		}
	});
}