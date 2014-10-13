<html>
<head>

<!--Titulo pagina-->
<title>Mi Barrio</title>
<!--Llamado del stilo css-->
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>

<!--Comienzo de la div que contiene el form-->
<div class="login-card">
	<h1>Mi Barrio</h1>

			<!--comienzo del form, se especifica el metodo de envio y el destino-->
			<form action="script/validar_Logueo.php" method="post">
			<h2>Usuario:</h2>
			<!--Input del form, campos-->
			<input type="text" name="user" placeholder="Nombre de usuario" maxlength="8" required="required">
			<h2>Contrase&ntilde;a:</h2>
			<input type="password" name="pass" placeholder="Contrase&ntilde;a" maxlength="8" required="required">

			<!--Boton para enviar el contenido del form-->
			<input type="submit" name="login" class="login login-submit" value="Ingresar">
			<?php

// Condiciones para la respuesta de validacion.php, imprime los errores en caso de haberlos.			
			{
			if (isset($_REQUEST['error']))
			echo "Los datos no son v&aacute;lidos<br>";
			elseif (isset($_REQUEST['error2']))
			echo "Ingrese un usuario<br>";
			elseif (isset($_REQUEST['error3']))
			echo "Ingrese una contrase&ntilde;a<br>";
			}
			?>
			</form>

	<!--Fin del form, y creacion del link de recuperacion de contraseña-->
			
	<div class="login-help">
    <a href="php/Contra.php">Olvid&eacute; mi contrase&ntilde;a</a>
	</div>	
</div>

</body>
</html>

