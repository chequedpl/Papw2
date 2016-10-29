<?php 
header('Content-type: application/json');

	$action = $_REQUEST['action'];
	
	if ($action == "login")
		login();
	if ($action == "registro")
		registro();

	function connect(){
		$databasehost = "127.0.0.1";
		$databasename = "papw2prubea";
		$databaseuser = "root";
		$databasepass = "";

		$mysqli = new mysqli($databasehost, $databaseuser, $databasepass, $databasename);
		if ($mysqli->connect_errno) {
			echo "Problema con la conexion a la base de datos";
		}
		return $mysqli;
	}

	function disconnect($mysqli){
		mysqli_close($mysqli);
	}


	function login(){

		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];

		$mysqli = connect();


		$result = $mysqli->query("call sp_login ('".$username. "', '".$password."')");


		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			//echo "Todo salio bien";	
			
			 $rows = array();

			 	while( $r = $result->fetch_assoc()) {
			 	$rows[] = $r;
			}
					
			echo json_encode($rows);	
		}
		
		$result->free();
		disconnect($mysqli);

	}

		function registro(){

		$username = $_REQUEST['username'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$fecha = $_REQUEST['fecha'];
		$genero = $_REQUEST['genero'];

		$mysqli = connect();


		$result = $mysqli->query("call sp_registro ('".$username. "', '".$email."', '".$password."', '".$fecha."', '".$genero."')");


		if (!$result) {
			echo "Problema al hacer un query: " . $mysqli->error;								
		} else {
			//echo "Todo salio bien";	
			
			 $rows = array();

			 	while( $r = $result->fetch_assoc()) {
			 	$rows[] = $r;
			}
					
			echo json_encode($rows);	
		}
		
		$result->free();
		disconnect($mysqli);

	}

		// $user = $_REQUEST['Usuario'];
		// $pass = $_REQUEST['Correo'];
		// $ema = $_REQUEST['Contrasenia'];
		// $fecha = $_REQUEST['Fecha'];

		// $mysqli = connect();

		// $result = $mysqli->query("call sp_registro ('".$user. "', '".$pass."', '".$ema."', '".$fecha."')");

		// if (!$result) {
		// 	echo "Problema al hacer un query: " . $mysqli->error;								
		// } else {
		// 	echo "Todo salio bien";	


		// }
		
		// $result->free();
		// disconnect($mysqli);

?>