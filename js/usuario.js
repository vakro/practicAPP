$(document).ready(function(){
	listarUsuarios();
});


function listarUsuarios(){	

	var parametros = {		
		"command":"consultarUsuario"
	}

	$.ajax({
		url:"../controller/usuarioController.php",
		data: parametros,
		success:function(data){


			var parsed = JSON.parse(data);
			var cadena='';

			for(var i=0; i<parsed.length; i++){
				cadena+="<tr>"+
							"<td>"+(i+1)+"</td>"+
							"<td>"+parsed[i]['name']+"</td>"+
							"<td>"+parsed[i]['username']+"</td>"+
							"<td>"+parsed[i]['email']+"</td>"+
							"<td>"+"<button class='btn btn-danger btn-sm' onclick='borrarUsuario("+parsed[i]['id']+")'>"+"<i class='fa fa-times'></i>"+"</button>"+"</td>"+
						"</tr>";						
			}

			$("#tbodyUsuario").html(cadena);
			$("#tbodyUsuario").prev("thead").find("th").css("background-color", "#0B3861");
			$("#table_usuarios").DataTable();
		}
	});

}

function borrarUsuario(id){
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

	  	var idUsuario = id;
	  	var parametros = {
	  		"idUsuario":idUsuario,
	  		"command":"borrarUsuario"
	  	}

	  	$.ajax({
	  		url:"../controller/usuarioController.php",
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

				listarUsuarios();
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

