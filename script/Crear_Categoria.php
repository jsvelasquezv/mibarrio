<?php

	include_once '../modelos/Validar_Categoria.php';
	// incluye las clases con metodos necesarios para la creacion del perfil

	// obitne el nombre(string) y permisos(boolean) del nuevo perfil ingresados en el form. 

	$crear_Categoria = new Validar_Categoria();
	$crear_Categoria->validar_Crear_Categoria($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion']);

	// crea el nuevo perfil y pasa los datos correspondientes al nuevo perfil
	
	//}
?>