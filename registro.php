<!DOCTYPE html>
<html lang="es">
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="regstyle.css">

	<script type="text/javascript" src="jquery/jquery-2.1.4.min.js"></script>


</head>
<body>

	<div id="reg">
	<h1>¡Registrate!</h1>
		<form method="post">
			<br> Avatar <br>	<img src="mas.jpg"> <br>	<br>
			Usuario <input type="text" name="Usuario" id="user" class="in">	<br>
			Correo	<input type="email" name="Correo" id="emal" class="in">	<br>
			Contraseña	<input type="password" name="Contrasenia" id="pass" class="in"> <br>
			Fecha	<input type="date" name="Fecha" id="fecha" class="in"> <br>
			<input type="radio" name="Genero" value="male" checked> Hombre
  			<input type="radio" name="Genero" value="female"> Mujer <br> <br>			
			Portada <br>

			<input type="submit" class="in" id="btn">
		</form>

		<?php

			if(isset($_POST['submit'])){
				require("C:/xampp/htdocs/xampp/webservice2.php");
			}

		?>
		

	</div>

</body>
</html>