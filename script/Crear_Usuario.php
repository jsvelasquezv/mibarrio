<?php
	include_once '../class/Validacion_Usuario.php';

	$c_usuario = new Validar_Usuario();
	$c_usuario->validar_Crear_Usuario($_REQUEST['n_id'], $_REQUEST['usu'], $_REQUEST['pass'], $_REQUEST['nom'], $_REQUEST['apell'], 
						$_REQUEST['dire'], $_REQUEST['e_mail'], $_REQUEST['tipo_id'], $_REQUEST['ciud'], $_REQUEST['pregun'], $_REQUEST['respues'], 
						$_REQUEST['celu'], $_REQUEST['_edad'], $_REQUEST['fot'], $_REQUEST['gene'], $_REQUEST['perfi']);

	
	

?>