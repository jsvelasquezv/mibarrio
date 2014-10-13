<?php
	// incluye el menu y demas cosas contenidas en perfil.php
	include ("perfil.php"); 
	echo "<div class='contenido'>";
	echo "";
	//Dependiendo del genero muestra "Bienvenido" o "Bienvenida"
	if($c_usuario->get_Genero() == "F")	
		echo "<h1><b>Bienvenida, ".$c_usuario->get_Nombres().".</b></h1></div>";
	else 
		echo "<h1><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1></div>";
?>
