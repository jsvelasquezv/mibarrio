<?php
	// incluye los controladores y clases necesarias 
	include_once '../class/Validacion_Perfil.php';

	// recupera la id del perfil a borrar
	$borrar_Perfil = new Validar_Perfil();
	$borrar_Perfil->validar_Borrar_Perfil($_REQUEST['id']);
		// obtiene los permisos del usuario que inicio sesion, para dejarlo continuar



?>