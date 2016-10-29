 function enviardatos(){

	var user = document.getElementById("user").value;
	var pass = document.getElementById("pass").value;

	if (user == "" || pass == "") {
				alert("Usuario o contraseña vacio(s)");
	} else{

			var dataToSend = {action: "login", username: user , password: pass};

				$.ajax({
				url: "webservice2.php",
				async: true,
				type: "POST",
				dataType: "json",
				data: dataToSend,
				success: function(data){
					
					console.log(data);
					// var idusu = data[0].idUsuario;
					// if (data != null) {
					// 	for (var i = 0; i < data.length; i++) {
					// 		score = data[i].idUsuario;
					// 		nick = data[i].nickname;
					// 		$('#idusu').val(score);
					// 		$('#nick').val(nick);
					// 	}
					// }		
					// $('#scores-container').show();
				},
				error: function(x,y,z){
					console.log("ERROR BITCH" + x + y + z);

				}

			});

		}
	}