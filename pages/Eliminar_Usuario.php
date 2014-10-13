<?php

	include ("perfil.php"); 
	echo '<div class="contenido">';
	$c_usuario2 = new Controlador_Usuario();
	$m_usuario2 = new Modelo_Usuario($c_usuario2);
	if($c_perfil->get_PermisoSistema())	{
		$usuario = $_REQUEST['gestion'];
		$m_usuario2->buscar_Usuario2($usuario);
		switch ($usuario) {
			case "exito":
			 	if($c_perfil->get_PermisoSistema()){
					echo "<h1><i>Se ha eliminado el Usuario.</i></h1>";
			 	}else
					echo "<h1><i>Esto no te pertenece.</i></h1>";
			break; 
			case "error":
			 	if($c_perfil->get_PermisoSistema()){
					echo "<h1><i>No se ha eliminado el usuario.</i></h1>";
			 	}else
					echo "<h1><i>Esto no te pertenece.</i></h1>";
			break;
			default:
				echo "
					<form action='../script/Borrar_Usuario.php?documento=".$usuario."' method='post'>
					<h1>Est&aacute; seguro de que quiere eliminar el usuario ".$c_usuario2->get_Nombres()." ".
					$c_usuario2->get_Apellidos()."?</h1><p>
					<input type='submit' name='eliminar' class='login login-submit' value='Eliminar Usuario'>

				";
				break;
		}

	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";

	echo "</div>";
	
?>