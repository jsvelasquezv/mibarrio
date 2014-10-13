<?php
	// inicia session, para obtener las variaboles globales del usuario y contraseña
	session_start();
?>

<html>
<head>

<title>Mi Barrio</title>
<link rel="stylesheet" href="../css/pages.css" media="screen" type="text/css" />
	<link rel="stylesheet" type="text/css" media="screen and (max-width : 1000px)" href="../css/pequeno.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (min-width : 1001px)" href="../css/mediano.css" /> 
	<link rel="stylesheet" type="text/css" media="screen and (min-width : 1200px)" href="../css/grande.css" />
<link rel="stylesheet" href="../css/tablas.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../css/varios.css" media="screen" type="text/css" />

</head>
<body>

<div class='sesion-bar'>
	<a href='../script/Cerrar_sesion.php'>Cerrar sesi&oacute;n
	<img src='../resources/cerrar_sesion.png' width='20' height='20' href='#' alt="Cerrar Sesion"></a>
</div>

<div class="menu-bar">
	<div class='image-perfil'>
		<?php 
		include_once '../modelos/Modelo_Usuario.php';
		include_once '../controladores/Controlador_Usuario.php';
		include_once '../controladores/Controlador_Perfil.php';
		include_once '../modelos/Modelo_Perfil.php';
		// se crean los objetos que se usaran para mostrar el menu dependiendo de los permisos
		$c_usuario = new Controlador_Usuario();
		$m_usuario = new Modelo_Usuario($c_usuario);
		// se obtiene el usuario que inicio sesion
		$usuario=$_SESSION['nick'];	
		$m_usuario->buscar_Usuario($usuario);

		//aqui verifica si la clave dela sesion iniciada es la misma de la BD, en caso sontraio devuelve a login

		if (!isset($_SESSION['clave']))
				header("Location: ../index.php");

		elseif($c_usuario->get_Password()!=$_SESSION['clave'])
				header("Location: ../index.php");
		else{
			// se imprime la imagen del usuario que inicio sesion

			echo "<img src='".$c_usuario->get_Foto()."' border='0' width='160' height='180'>"; 

			echo"</div>";
			//aqui termina la div de la imagen


			// imprime el nombre de usuario abajo de la imagen, en el menu
			echo "<h1>".$c_usuario->get_Usuario()."</h1>"; 
			// se incluyen las clases a usar, en caso de no haber sido incluidas antes

			// se crean los objetos que se usaran en la impresion del menu
			$c_perfil = new Controlador_Perfil();
			$m_perfil = new Modelo_Perfil($c_perfil);
			// se busca el perfil asociado al usuario que inicio session 
			$m_perfil->buscar_Perfil2($c_usuario->get_Perfil());
			$m_perfil->desconectarBD();

				
			// de acuerdo a los permisos del perfil, imprime o no los links de cada permiso
			echo"<label for='show-menu' class='show-menu'>Menu</label>
			<input type='checkbox' id='show-menu' role='button'>";

			echo"<ul id='menu'>";

			$enlace_sistema = "bajo";
			if($c_perfil->get_PermisoSistema()){
				$enlace_sistema = "alto";
			}
			echo "<li>
			<div class='login-help'>";
			echo "<a href='Sistema.php?gestion=$enlace_sistema'>Gesti&oacute;n de usuarios</a></div>
			</li>
			<li>";

			if($c_perfil->get_PermisoPerfiles()){
				echo "<li>
				<div class='login-help'>";
				echo "<a href='Gestion_Perfil.php?gestion=perfil'>Gesti&oacute;n Perfil</a></div>
				</li>";
			}
			if($c_perfil->get_PermisoProductos()){
				echo "<li><div class='login-help'>";
				echo "<a href='#'>Productos</a></div></li>";
			}
			if($c_perfil->get_PermisoInventario()){
				echo "<li><div class='login-help'>";
				echo "<a href='#'>Inventario</a></div></li>";
			}
			if($c_perfil->get_PermisoFacturacion()){
				echo "<li><div class='login-help'>";
				echo "<a href='#'>Facturaci&oacute;n</a></div></li>";
			}

			if($c_perfil->get_PermisoReportes()){
				echo "<li><div class='login-help'>";
				echo "<a href='#'>Reportes</a></div></li>";
			}
			echo"</ul>";

			// imprime el nombre del perfil asociado al usuario
			echo "<h2> <br>Tipo de perfil: <br>".$c_perfil->get_Nombre()."</h2>";
		}


echo"</div>";
/*
*/

?>



</body>
</html>