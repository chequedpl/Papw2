function registroDatos(){

	var user = document.getElementById("user").value;
	var email = document.getElementById("email").value;
	var contra = document.getElementById("pass").value;
	var fecha = document.getElementById("fecha").value;
	var generos;
	if(document.getElementById("generoH").checked){
		generos = "H";
	} else{
		generos = "M";
	}

	
	

	if (generos=="" ||user == "" || email == "" || contra =="" || fecha=="") {
				alert("Porfavor de Llenar Todos los Campos");
	} else{

			var dataToSend = {action: "registro", username: user , email: email, password: contra, fecha: fecha, genero: generos};

				$.ajax({
				url: "webservice2.php",
				type: "POST",
				dataType: "json",
				data: dataToSend,
				success: function(data){
					
					 if (data != null) {
					 	var nombre = data[0].nombre;
					 	
					 }		
					// $('#scores-container').show();
				},
				error: function(x,y,z){
					alert("ERROR BITCH" + x + y + z);

				}

			});

		}

};