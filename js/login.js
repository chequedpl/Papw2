 function enviardatos(){

	var user = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;

	if (user == "" || pass == "") {
				alert("Usuario o contraseña vacio(s)");
	} else{

			var dataToSend = {action: "login", username: user , password: pass};

				$.ajax({
				url: "webservice2.php",
				type: "POST",
				dataType: "json",
				data: dataToSend,
				success: function(data){
					
					
					
					 if (data.length == 0) {
						 alert ("Intentelo de Nuevo");
						 window.location.replace("index.html");

					 }	else{
					 	var nombre = data[0].nombre;
					 	var email = data[0].email;

					}
					
				},
				error: function(x,y,z){
					alert("ERROR BITCH" + x + y + z);

				}

			});

		}
};