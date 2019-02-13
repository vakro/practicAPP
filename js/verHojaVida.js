$(document).ready(function(){	
	llenarTablaHojadeVida();
});

function llenarTablaHojadeVida(){

	var parametros = {
		"command":"llenarTablaHojadeVida"
	}

	$.ajax({
		url:"../controller/verHojaVidaController.php",
		data: parametros,
		success:function(data){
			
			var parsed = JSON.parse(data);
			cadena="";
			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
				          "<td>"+"<center>"+(i+1)+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['numero_documento']+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['nombre_estudiante']+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['apellidos_estudiante']+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['desc_programa']+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['semestre']+"</center>"+"</td>"+
				          "<td>"+"<center>"+parsed[i]['fechaingreso']+"</center>"+"</td>"+
				          "<td>"+"<center>"+"<button class='btn btn-danger' onclick='generarPDF("+parsed[i]['idPage']+")' title='ver PDF'>"+"<i class='fa fa-file-pdf-o' aria-hidden='true'>"+"</i>"+"</button>"+"</center>"+"</td>"+
				        "</tr>";
			}

			$("#tbodyHojaVida").html(cadena);
			$("#tbodyHojaVida").prev("thead").find("th").css("background-color", "#0B3861");
			$("#table_id").DataTable();
		}
	});
}

//GENERAR PDF
function generarPDF(idPage){
	window.open("generarPdf.php?idEst="+idPage+"");
}

