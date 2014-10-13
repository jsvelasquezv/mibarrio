<?php
	
	include_once '../class/Validacion_Usuario.php';

	$password= "";
	$perfil= $_REQUEST['perfi'];
	echo 'perfil = '.$perfil.'<p>';

	$modi_usuario = new Validar_Usuario();
	$modi_usuario->validar_Modificar_Usuario($_REQUEST['n_id'], $_REQUEST['usu'], $password, $_REQUEST['nom'], $_REQUEST['apell'], 
						$_REQUEST['dire'], $_REQUEST['e_mail'], $_REQUEST['tipo_id'], $_REQUEST['ciud'], $_REQUEST['pregun'], $_REQUEST['respues'], 
						$_REQUEST['celu'], $_REQUEST['_edad'], $_REQUEST['fot'], $_REQUEST['gene'], $perfil);

?>