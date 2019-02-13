$(document).ready(function(){
	listarEmpresas();	
});

//Cancelar submit del form
$("#formEmpresa").submit(function(evt){
	evt.preventDefault();
})


//INSERTAR EMPRESA
$("#btnGuardarEmpresa").click(function(){
	//input
	var inputnombre_contacto = $("#nombre_contacto").val();
	var inputnombre_empresa = $("#nombre_empresa").val();
	var inputtelefono = $("#telefono").val();
	var inputcorreo = $("#correo").val();

	var parametros = {
		"inputnombre_contacto":inputnombre_contacto,
		"inputnombre_empresa":inputnombre_empresa,
		"inputtelefono":inputtelefono,
		"inputcorreo":inputcorreo,		
		"command":"insertarEmpresa"
	}

	$.ajax({
		url:"../controller/empresaController.php",
		data: parametros,
		success:function(data){
		
			if (data!=0) {
				
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
});

function limpiar(){
    $("#nombre_contacto").val("");
    $("#nombre_empresa").val("");
    $("#telefono").val("");
    $("#correo").val("");
} 


function listarEmpresas(){	

	var parametros = {		
		"command":"consultarEmpresa"
	}

	$.ajax({
		url:"../controller/empresaController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td><center>"+(i+1)+"</td></center>"+
							"<td><center>"+parsed[i]['nombre_contacto']+"</td></center>"+
							"<td><center>"+parsed[i]['nombre_empresa']+"</td></center>"+
							"<td><center>"+parsed[i]['telefono']+"</td></center>"+
							"<td><center>"+parsed[i]['correo']+"</td></center>"+
							"<td><center>"+"<button class='btn btn-info btn-sm' data-toggle='modal' data-target='#modalActualizarEmpresa' onclick='llenarCampos("+parsed[i]['id']+")'>"+"<i class='fa fa-pencil'></i>"+"</button>"+"</td></center>"+
							"<td><center>"+"<button class='btn btn-danger btn-sm' onclick='borrarEmpresa("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td></center>"+
						"</tr>";						
			}

			$("#tbodyEmpresa").html(cadena);
			$("#tbodyEmpresa").prev("thead").find("th").css("background-color", "#0B3861");
			$("#table_empresas").DataTable();
		}
	});

}

function llenarCampos(id){
	var idEmpresa = id;
	var parametros = {
		"idEmpresa" : idEmpresa,
		"command":"buscarEmpresa"
	}

	$.ajax({
		 url: "../controller/empresaController.php",
		 data: parametros,
		 success: function(data){
		 	    //console.log(data);
		 	    var parsed = JSON.parse(data);

		 	    for(var i=0; i<parsed.length; i++){
		 	    	$("#nombre_contacto").val(parsed[i]['nombre_contacto']);
		 	    	$("#nombre_empresa").val(parsed[i]['nombre_empresa']);
		 	    	$("#telefono").val(parsed[i]['telefono']);
		 	    	$("#correo").val(parsed[i]['correo']);
		 	    	$("#idEmpresa").val(parsed[i]['id']);
		 	    }		 
		 }
	});
}

$("#actualizarEmpresa").click(function(){
	
	var inputnombre_contacto = $("#nombre_contacto").val();
	var inputnombre_empresa = $("#nombre_empresa").val();
	var inputtelefono = $("#telefono").val();
	var inputcorreo = $("#correo").val();
	var idEmpresa = $("#idEmpresa").val();

	var parametros = {
		"inputnombre_contacto":inputnombre_contacto,
		"inputnombre_empresa":inputnombre_empresa,
		"inputtelefono":inputtelefono,
		"inputcorreo":inputcorreo,
		"idEmpresa":idEmpresa,
		"command":"actualizarEmpresa"
	}

	$.ajax({
		url: "../controller/empresaController.php",
		data: parametros,
		success: function(data){
			if(data!=0){
				Swal.fire(
				  'Actualizado Correctamente!',
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
			listarEmpresas();

		}
	})
});


function borrarEmpresa(id){
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

	  	var idEmpresa = id;
	  	var parametros = {
	  		"idEmpresa":idEmpresa,
	  		"command":"borrarEmpresa"
	  	}

	  	$.ajax({
	  		url:"../controller/empresaController.php",
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

				listarEmpresas();
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