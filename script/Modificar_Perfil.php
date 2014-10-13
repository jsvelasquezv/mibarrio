<?php
	// incluye los archivos con las clases y metodos necesarios

		include_once '../class/Validacion_Perfil.php';
	// incluye las clases con metodos necesarios para la creacion del perfil

	// obitne el nombre(string) y permisos(boolean) del nuevo perfil ingresados en el form. 

	$crear_Perfil = new Validar_Perfil();
	$crear_Perfil->validar_Modificar_Perfil($_REQUEST['newnomb'],$_REQUEST['newsis'],$_REQUEST['newperf'],
		$_REQUEST['newprod'],$_REQUEST['newinv'],$_REQUEST['newfac'],$_REQUEST['newrep'],$_REQUEST['perfil']);


	//}
	

?>
