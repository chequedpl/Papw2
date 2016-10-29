<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/regstyle.css">

	<script type="text/javascript" src="jquery/jquery.js"></script>



</head>
<body>

	<div id="reg">
	<h1>¡Registrate!</h1>
			
				<form method="post" enctype="multipart/form-data">
				<br> Avatar <br>	<input type="file" name="txtImg">	<!-- <img src="img/mas.jpg"> --> <br>	<br>
				Usuario <input type="text" name="Usuario" id="user" class="in">	<br>
				Correo	<input type="email" name="Correo" id="email" class="in">	<br>
				Contraseña	<input type="password" name="Contrasenia" id="pass" class="in"> <br>
				Fecha	<input type="date" name="Fecha" id="fecha" class="in"> <br>
				<input type="radio" name="generos" value="H"  id="generoH"checked> Hombre
	  			<input type="radio" name="generos" value="M" id="generoF"> Mujer <br> <br>			
				

				<input type="submit" name="submit" class="in" id="btn" onclick="">

			</form>

			<?php

			if(isset($_POST['submit'])){

				$nombre = $_FILES[ 'txtImg' ][ 'name' ];
				$tmp = $_FILES[ 'txtImg' ][ 'tmp_name' ];
				$folder = 'imagenesBlob';

				

				move_uploaded_file($tmp, $folder.'/'.$nombre);

				$bytesArchivo = file_get_contents($folder.'/'.$nombre);

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

				$usu = $_POST['Usuario'];
				$ema = $_POST['Correo'];
				$contra = $_POST['Contrasenia'];
				$fech = $_POST['Fecha'];
				$gene = $_POST['generos'];

				$mysqli = connect();

				$sql = "INSERT INTO usuario(nombre, email, contrasenia, fecha, genero, avatar) VALUES(?,?,?,?,?,?) ";
				$stm = $mysqli->prepare( $sql );
				$stm->bind_param( 'ssssss' ,  $usu, $ema, $contra, $fech, $gene, $bytesArchivo);
				if ($stm->execute()) {
					
				}

				mysqli_close($mysqli);

			}

			?>

	</div>

</body>
</html>