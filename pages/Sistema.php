<?php

	include ("perfil.php"); 

	echo"<div class='contenido'>";

	$recibe_pagina=$_REQUEST['gestion'];

	switch ($recibe_pagina){ 
		case "alto":
		 	
		   //include ("Gestion_Perfil.php"); 
		 	if($c_perfil->get_PermisoSistema()){
		 		echo "<a href='Crear_Usuario.php?gestion=crearPerfil'><div class='links2 links2-submit'>";
				echo "<b>Crear usuario</b></div></a><br><br>";

				echo "<a href='Ver_Usuario.php?page=1'><div class='links2 links2-submit'>";
				echo "<b>Visualizar usuario</b></div></a>";
		 		
		 	}else
				echo "<h1><i>Esto no te pertenece.</i></h1>";
		 	

		break;
		case "bajo":
			echo "<a href='Ver_Usuario.php?page=1'><div class='links2 links2-submit'>";
			echo "<b>Visualizar usuario</b></div></a>";
		break; 
		
	}
	echo "</div>";	
?>
