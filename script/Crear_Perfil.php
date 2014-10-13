<?php

	include_once '../class/Validacion_Perfil.php';
	// incluye las clases con metodos necesarios para la creacion del perfil

	// obitne el nombre(string) y permisos(boolean) del nuevo perfil ingresados en el form. 

	$crear_Perfil = new Validar_Perfil();
	$crear_Perfil->validar_Crear_Perfil($_REQUEST['nomb_Perfil'],$_REQUEST['sis'],$_REQUEST['perf'],
		$_REQUEST['prod'],$_REQUEST['inv'],$_REQUEST['fac'],$_REQUEST['rep']);

	// crea el nuevo perfil y pasa los datos correspondientes al nuevo perfil
	
	//}
	

?>