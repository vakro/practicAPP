$(document).ready(function(){
	limpiar();
	llenarSelect("tipo_documento", "tipo_documento", "id", "desc_documento", 0, 0);
	llenarSelect("genero", "genero", "id", "desc_genero", 0, 0);
	llenarSelect("estado_civil", "estado_civil", "id", "desc_est_civil", 0, 0);
	llenarSelect("pais_nacimiento", "pais", "id", "nombre_pais", 0, 0);
	llenarSelect("facultad", "facultad", "id", "nombre_facultad", 0, 0);
	llenarSelect("semestre", "semestre", "id", "desc_semestre", 0, 0);

	$('#modalRecomendacion').modal('show'); //Lanzar recomendaciones al inicio
	$("#btnActualizarInfoPersonal").prop("disabled", true);
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
		url:"../controller/personalController.php",
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

$("#pais_nacimiento").change(function(){
	var valuePais = $("#pais_nacimiento").val();
	$("#depto_nacimiento").html("");
	llenarSelect("depto_nacimiento", "departamento", "id", "nombre_depto", "id_pais", valuePais);

	//Setear ciudad con la opcion cuyo valor es 0
	var cadena="<option value='0'>"+'-- Seleccione --'+"</option>";
	$("#ciudad_nacimiento").html("");
	$("#ciudad_nacimiento").html(cadena);
	
})

$("#depto_nacimiento").change(function(){
	var valueDepto = $("#depto_nacimiento").val();
	$("#ciudad_nacimiento").html("");

	if (valueDepto!=0) {
		llenarSelect("ciudad_nacimiento", "ciudad", "id", "nombre_ciudad", "id_depto", valueDepto);
	}else{
		var cadena="<option value='0'>"+'-- Seleccione --'+"</option>";
		$("#ciudad_nacimiento").html("");
		$("#ciudad_nacimiento").html(cadena);
	}
})

$("#facultad").change(function(){
	var valueFacultad = $("#facultad").val();
	$("#programa").html("");



	if (valueFacultad!=0) {
		llenarSelect("programa", "programa", "id", "desc_programa", "facultad", valueFacultad);
	}else{
		var cadena="<option value='0'>"+'-- Seleccione --'+"</option>";
		$("#programa").html("");
		$("#programa").html(cadena);
	}
})


//Inicio contador de descripcion
var text_max = 800;
$('#count_message').html('Quedan ' + text_max + ' caracteres');

$('#perfil_profesional').keyup(function() {
	var text_length = $('#perfil_profesional').val().length;
	var texto = text_max - text_length;

	$('#count_message').html('Quedan ' + texto + ' caracteres');
});
//Fin contador de descripcion

//Cancelar submit del form
$("#forminfoPersonal").submit(function(evt){
	evt.preventDefault();
})


//Buscar documento
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
			url:"../controller/personalController.php",
			data: parametros,
			success:function(data){
				//console.log(data);
				var parsed = "";

				if (data==0) {
					$("#nombres").val("");
					$("#apellidos").val("");
					//$("#tipo_documento").val(0);
					$("#fecha_nacimiento").val("");
					$("#genero").val(0);
					$("#estado_civil").val(0);
					$("#pais_nacimiento").val(0);
					$("#depto_nacimiento").val(0);
					$("#ciudad_nacimiento").val(0);
					$("#direccion").val("");
					$("#telefono").val("");
					$("#celular").val("");
					$("#correo").val("");
					$("#facultad").val(0);
					$("#programa").val(0);
					$("#semestre").val(0);
					$("#perfil_profesional").val("");
					$("#idEst").val("");

					$("#btnGuardarInfoPersonal").prop("disabled", false);
					$("#btnActualizarInfoPersonal").prop("disabled", true);

				}else{
					parsed = JSON.parse(data);
					var idEst = parsed[0]['id'];
					var nombres = parsed[0]['nombre_estudiante'];
					var apellidos = parsed[0]['apellidos_estudiante'];
					var tipo_documento = parsed[0]['tipo_documento'];
					var fecha_nacimiento = parsed[0]['fecha_nacimiento'];
					var genero = parsed[0]['genero'];
					var estado_civil = parsed[0]['estado_civil'];
					var direccion = parsed[0]['direccion'];
					var telefono = parsed[0]['telefono'];
					var celular = parsed[0]['celular'];
					var correo = parsed[0]['correo'];
					var semestre = parsed[0]['semestre'];
					var perfil_profesional = parsed[0]['perfil_profesional'];
                    
                   	$("#nombres").val(nombres);					
					$("#apellidos").val(apellidos);
					$("#tipo_documento").val(tipo_documento);
					$("#fecha_nacimiento").val(fecha_nacimiento);
					$("#genero").val(genero);
					$("#estado_civil").val(estado_civil);
					$("#direccion").val(direccion);
					$("#telefono").val(telefono);
					$("#celular").val(celular);
					$("#correo").val(correo);
					$("#semestre").val(semestre);
					$("#perfil_profesional").val(perfil_profesional);
					$("#idEst").val(idEst);

					$("#btnGuardarInfoPersonal").prop("disabled", true);
					$("#btnActualizarInfoPersonal").prop("disabled", false);
				}
			}
		})
	}
})



//INSERTAR INFO PERSONAL
$("#btnGuardarInfoPersonal").click(function(){

	if (
			validarCampoInput(nombres,'^[a-zA-Z ñáéíóú]{3,50}$',1)== false ||
			validarCampoInput(apellidos,'^[a-zA-Z ñáéíóú]{3,80}$',1)== false ||
			validarCampoSelect(tipo_documento,1)== false ||
			validarCampoInput(documento,'^[0-9]{7,15}$',1)== false ||
			validarCampoSelect(genero,1)== false ||
			validarCampoSelect(estado_civil,1)== false ||
			validarCampoSelect(pais_nacimiento,1)== false ||
			validarCampoSelect(depto_nacimiento,1)== false ||
			validarCampoSelect(ciudad_nacimiento,1)== false ||
			validarCampoInput(direccion,'^[a-zA-z0-9 -_#.]{3,60}$',1)== false ||
			validarCampoInput(telefono,'^[0-9]{7,10}$|^[0-9]{7,10} ext [0-9]{2,4}$',1)== false ||
			validarCampoInput(celular,'^[0-9]{10}$',1)== false ||
			validarCampoInput(correo,'^[a-zA-Z0-9-_.]{5,40}?\@(gmail|hotmail|yahoo|outlook)\.(com|es|com.ar)$',1)== false ||
			validarCampoSelect(facultad,1)== false ||
			validarCampoSelect(programa,1)== false ||
			validarCampoSelect(semestre,1)== false
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la informacion!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{
	
		//input
		var inputnombres = $("#nombres").val();
		var inputapellidos = $("#apellidos").val();
		var inputdocumento = $("#documento").val();
		var inputfecha_nacimiento = $("#fecha_nacimiento").val();
		var inputdireccion = $("#direccion").val();
		var inputtelefono = $("#telefono").val();
		var inputcelular = $("#celular").val();
		var inputcorreo = $("#correo").val();

		//select
		var selecttipo_documento = $("#tipo_documento").val();
		var selectgenero = $("#genero").val();
		var selectestado_civil = $("#estado_civil").val();
		var selectpais_nacimiento = $("#pais_nacimiento").val();
		var selectdepto_nacimiento = $("#depto_nacimiento").val();
		var selectciudad_nacimiento = $("#ciudad_nacimiento").val();
		var selectfacultad = $("#facultad").val();
		var selectprograma = $("#programa").val();
		var selectsemestre = $("#semestre").val();

		//textarea
		var textareaperfil_profesional = $("#perfil_profesional").val();

		var parametros = {
			"inputnombres":inputnombres,
			"inputapellidos":inputapellidos,
			"inputdocumento":inputdocumento,
			"inputfecha_nacimiento":inputfecha_nacimiento,
			"inputdireccion":inputdireccion,
			"inputtelefono":inputtelefono,
			"inputcelular":inputcelular,
			"inputcorreo":inputcorreo,
			"selecttipo_documento":selecttipo_documento,
			"selectgenero":selectgenero,
			"selectestado_civil":selectestado_civil,
			"selectpais_nacimiento":selectpais_nacimiento,
			"selectdepto_nacimiento":selectdepto_nacimiento,
			"selectciudad_nacimiento":selectciudad_nacimiento,
			"selectfacultad":selectfacultad,
			"selectprograma":selectprograma,
			"selectsemestre":selectsemestre,
			"textareaperfil_profesional":textareaperfil_profesional,
			"command":"insertarInfoPersonal"
		}

		$.ajax({
			url:"../controller/personalController.php",
			data: parametros,
			success:function(data){
				if (data!=0) {
					location.href = "registroFormacion.php?idEst="+data+"";
				}else{
					Swal.fire(
					  'Oops!',
					  'No fue posible guardar su informacion',
					  'error'
					)
				}
			}
		})

	}

});


function limpiar(){
	$("#nombres").val("");
	$("#apellidos").val("");
	$("#tipo_documento").val(0);
	$("#documento").val("");
	$("#fecha_nacimiento").val("");
	$("#genero").val(0);
	$("#estado_civil").val(0);
	$("#pais_nacimiento").val(0);
	$("#depto_nacimiento").val(0);
	$("#ciudad_nacimiento").val(0);
	$("#direccion").val("");
	$("#telefono").val("");
	$("#celular").val("");
	$("#correo").val("");
	$("#facultad").val(0);
	$("#programa").val(0);
	$("#semestre").val(0);
	$("#perfil_profesional").val("");
	$("#idEst").val("");
}

$(nombres).keyup(function(event){validarCampoInput(nombres,'^[a-zA-Z ñáéíóú]{3,50}$',1)});
$(apellidos).keyup(function(event){validarCampoInput(apellidos,'^[a-zA-Z ñáéíóú]{3,80}$',1)});
$(documento).keyup(function(event){validarCampoInput(documento,'^[0-9]{7,15}$',1)});
$(direccion).keyup(function(event){validarCampoInput(direccion,'^[a-zA-z0-9 -_#.]{3,60}$',1)});
$(telefono).keyup(function(event){validarCampoInput(telefono,'^[0-9]{7,10}$|^[0-9]{7,10} ext [0-9]{2,4}$',1)});
$(celular).keyup(function(event){validarCampoInput(celular,'^[0-9]{10}$',1)});
$(correo).keyup(function(event){validarCampoInput(correo,'^[a-zA-Z0-9-_.]{5,40}?\@(gmail|hotmail|yahoo|outlook)\.(com|es|com.ar)$',1)});
$(tipo_documento).change(function(){validarCampoSelect(tipo_documento,1)});
$(genero).change(function(){validarCampoSelect(genero,1)});
$(estado_civil).change(function(){validarCampoSelect(estado_civil,1)});
$(pais_nacimiento).change(function(){validarCampoSelect(pais_nacimiento,1)});
$(depto_nacimiento).change(function(){validarCampoSelect(depto_nacimiento,1)});
$(ciudad_nacimiento).change(function(){validarCampoSelect(ciudad_nacimiento,1)});
$(facultad).change(function(){validarCampoSelect(facultad,1)});
$(programa).change(function(){validarCampoSelect(programa,1)});
$(semestre).change(function(){validarCampoSelect(semestre,1)});


//ACTUALIZAR INFORMACION
$("#btnActualizarInfoPersonal").click(function(){

	if (
			validarCampoInput(nombres,'^[a-zA-Z ñáéíóú]{3,50}$',1)== false ||
			validarCampoInput(apellidos,'^[a-zA-Z ñáéíóú]{3,80}$',1)== false ||
			validarCampoSelect(tipo_documento,1)== false ||
			validarCampoInput(documento,'^[0-9]{7,15}$',1)== false ||
			validarCampoSelect(genero,1)== false ||
			validarCampoSelect(estado_civil,1)== false ||
			validarCampoSelect(pais_nacimiento,1)== false ||
			validarCampoSelect(depto_nacimiento,1)== false ||
			validarCampoSelect(ciudad_nacimiento,1)== false ||
			validarCampoInput(direccion,'^[a-zA-z0-9 -_#.]{3,60}$',1)== false ||
			validarCampoInput(telefono,'^[0-9]{7,10}$|^[0-9]{7,10} ext [0-9]{2,4}$',1)== false ||
			validarCampoInput(celular,'^[0-9]{10}$',1)== false ||
			validarCampoInput(correo,'^[a-zA-Z0-9-_.]{5,40}?\@(gmail|hotmail|yahoo|outlook)\.(com|es|com.ar)$',1)== false ||
			validarCampoSelect(facultad,1)== false ||
			validarCampoSelect(programa,1)== false ||
			validarCampoSelect(semestre,1)== false
		) 
	{
		Swal.fire(
		  'No se ha podido guardar la informacion!',
		  'Verifica nuevamente tu datos',
		  'error'
		)
	}else{

		var idEst = $("#idEst").val();
	
		//input
		var inputnombres = $("#nombres").val();
		var inputapellidos = $("#apellidos").val();
		var inputdocumento = $("#documento").val();
		var inputfecha_nacimiento = $("#fecha_nacimiento").val();
		var inputdireccion = $("#direccion").val();
		var inputtelefono = $("#telefono").val();
		var inputcelular = $("#celular").val();
		var inputcorreo = $("#correo").val();

		//select
		var selecttipo_documento = $("#tipo_documento").val();
		var selectgenero = $("#genero").val();
		var selectestado_civil = $("#estado_civil").val();
		var selectpais_nacimiento = $("#pais_nacimiento").val();
		var selectdepto_nacimiento = $("#depto_nacimiento").val();
		var selectciudad_nacimiento = $("#ciudad_nacimiento").val();
		var selectfacultad = $("#facultad").val();
		var selectprograma = $("#programa").val();
		var selectsemestre = $("#semestre").val();

		//textarea
		var textareaperfil_profesional = $("#perfil_profesional").val();

		var parametros = {
			"idEst":idEst,
			"inputnombres":inputnombres,
			"inputapellidos":inputapellidos,
			"inputdocumento":inputdocumento,
			"inputfecha_nacimiento":inputfecha_nacimiento,
			"inputdireccion":inputdireccion,
			"inputtelefono":inputtelefono,
			"inputcelular":inputcelular,
			"inputcorreo":inputcorreo,
			"selecttipo_documento":selecttipo_documento,
			"selectgenero":selectgenero,
			"selectestado_civil":selectestado_civil,
			"selectpais_nacimiento":selectpais_nacimiento,
			"selectdepto_nacimiento":selectdepto_nacimiento,
			"selectciudad_nacimiento":selectciudad_nacimiento,
			"selectfacultad":selectfacultad,
			"selectprograma":selectprograma,
			"selectsemestre":selectsemestre,
			"textareaperfil_profesional":textareaperfil_profesional,
			"command":"actualizarInfoPersonal"
		}

		$.ajax({
			url:"../controller/personalController.php",
			data: parametros,
			success:function(data){
				if (data!=0) {
					location.href = "registroFormacion.php?idEst="+idEst+"";
				}else{
					Swal.fire(
					  'Oops!',
					  'No fue posible guardar su informacion',
					  'error'
					)
				}
			}
		})

	}

})