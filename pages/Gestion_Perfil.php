<?php
	//agrega el menu y entre otros, contenidos en perfil.php
	include ("perfil.php"); 
	
	echo"<div class='contenido'>";
	//recibe el header de la url para verificar la opcion escogida
	$recibe_pagina=$_REQUEST['gestion'];

	switch ($recibe_pagina){ 
	 case "perfil":
	 	// en caso de ser pefil, muestra los botones de crear perfil, y visualizar perfil, son links
	 	
	   //include ("Gestion_Perfil.php"); 
	 	if($c_perfil->get_PermisoPerfiles()){
	 		echo "<a href='Crear_Perfil.php?gestion=crearPerfil'><div class='links2 links2-submit'>";
			echo "<b>Crear perfil</b></div></a><br><br>";

			echo "<a href='Crear_Perfil.php?gestion=visualizar'><div class='links2 links2-submit'>";
			echo "<b>Visualizar perfil</b></div></a>";
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";
	 	

		break;
		
		default:
			// por defecto si no hay nada en el header, imprime esto.
			echo "<h1><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1>";
		break;
		
	}
	echo "</div>";	
?>