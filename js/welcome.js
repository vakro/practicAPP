$("#logout").click(function(){

	var parametros = {
		"command":"logout"
	}

	$.ajax({
		url:"../controller/welcomeController.php",
		data: parametros,
		success:function(data){
			if (data==0) {
				location.reload();
			}else{
				console.log("problemas al cerrar sesión");
			}
		}
	});


});