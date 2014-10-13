<?php
	//se incluye la pagina basica, menu entre otras cosas
	include ("perfil.php"); 
	// contenedor central
	echo '<div class="contenido">';
	//verificacion de permisos
	if($c_perfil->get_PermisoSistema())	{
		//verifica cual es la id del perfil a eliminar, enviada al dar en el enlace de eliminar
		$perfil= $_REQUEST['id'];
				//imprime un mensaje y un form advirtiendo si esta seguro de elimnar ese perfil, en caso de dar en submit,
			// envia el nombre del perfil para ser borrado desde el controlador.
				echo "
					<form action='../script/Borrar_Perfil.php?id=".$perfil."' method='post'>
					<h1>Est&aacute; seguro de que quiere eliminar el perfil ".$perfil."?</h1><p>
					<input type='submit' name='eliminarP' class='login login-submit' value='Eliminar Perfil'>
				";


	}else
		// en caso de no tener los permisos imprime esto.
		echo "<h1><i>Esto no te pertenece.</i></h1>";

	echo "</div>";
	
?>
