<!DOCTYPE html>
<html lang="es">
<head>
	<title>Paquetes</title>
	<meta charset="utf-8">
	<script type="text/javascript" src="js/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="css/paquetes.css">

</head>
<body>

	<div id="main">
		<h1>¡Agrega Mas Productos!</h1>		<br><br>
		<form method="post" enctype="multipart/form-data">
			Nombre 		<input type="text" name="nombre" class="texto"><br>
			Descripcion <input type="text" name="descripcion" class="texto"><br>
			Precio		<input type="text" name="precio" class="texto"><br>
			Fotos 		<input type="file" name="foto1" class="texto"><br>
						<input type="file" name="foto2" class="texto"><br>
						<input type="submit" name="submit">
		</form>
	</div>

	<?php

	if (isset($_POST['submit'])){

		$nombreF1 = $_FILES ['foto1']['name'];
		$temp1 = $_FILES['foto1']['tmp_name'];
		$folder = 'imagenes';

		move_uploaded_file($temp1, $folder.'/'.$nombreF1);

		
		$nombreF2 = $_FILES ['foto2']['name'];
		$temp2 = $_FILES['foto2']['tmp_name'];

		move_uploaded_file($temp2, $folder.'/'.$nombreF2);

		$foto1 = $folder.'/'.$nombreF1;
		$foto2 = $folder.'/'.$nombreF2;

		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$precio = $_POST['precio'];
		
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

		$mysqli = connect();

		$sql = "INSERT INTO paquete(nombrePaquete, descripcionPaquete, precio, foto1, foto2, idUsuario) VALUES(?,?,?,?,?,'1')";
		$stm = $mysqli->prepare( $sql );
		$stm->bind_param('sssss', $nombre, $descripcion, $precio, $foto1, $foto2);
		if ($stm->execute()) {
			
		}

		mysqli_close($mysqli);
	}

	?>

</body>
</html>