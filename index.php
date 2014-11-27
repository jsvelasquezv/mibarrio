<!DOCTYPE html>
<html lang="en">
<head>

<!--Titulo pagina-->
<title>Mi Barrio</title>
<!--Llamado del stilo css-->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.min2.css" type="text/css" />
<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" />
</head>
<body>

<!--Comienzo de la div que contiene el form-->
<div class="container">
	<div class="row"><br><br><br><br></div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<div class="well modal-content">
			<h1 class="text-center page-header headline-title">Mi Barrio</h1>

					<!--comienzo del form, se especifica el metodo de envio y el destino-->
					<form role ="form" action="script/validar_Logueo.php" method="post" class="form-signin form col-md-12 center-block">
					<!-- <h4 class = "text-left">Usuario:</h4> -->
					<!--Input del form, campos-->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-user"></i></span>
							<input type="text" name="user" placeholder="Nombre de usuario" maxlength="8" required="required" class="form-control">
						</div>
							<br>
							<!--<h4 class = "text-left">Contrase&ntilde;a:</h4>-->
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-key"></i></span>
							<input type="password" name="pass" placeholder="Contrase&ntilde;a" maxlength="8" required="required" class="form-control">
						</div>
							

							<!--Boton para enviar el contenido del form-->
							<br>
							<input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Ingresar">
							<?php

				// Condiciones para la respuesta de validacion.php, imprime los errores en caso de haberlos.			
							{
							if (isset($_REQUEST['error']))
								echo "<br>
									<div class='alert alert-danger fade in' role='alert'>			
									  <strong>Error!</strong> Los datos no son v&aacute;lidos
									</div>";
							elseif (isset($_REQUEST['error2']))
							echo "Ingrese un usuario<br>";
							elseif (isset($_REQUEST['error3']))
							echo "Ingrese una contrase&ntilde;a<br>";
							}
							?>
							<br>
						<a href="php/Contra.php" class=" text-danger">Olvid&eacute; mi contrase&ntilde;a</a>
					</form>

			<!--Fin del form, y creacion del link de recuperacion de contraseña-->
					
			<div class="container ">
		    
			</div>	
		</div>
		</div>
	</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/npm.js"></script>
</body>
</html>

