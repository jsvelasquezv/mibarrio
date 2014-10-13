<?php
	include_once '../class/Validacion_Usuario.php'; 


	$borrar_usuario = new Validar_Usuario();
	$borrar_usuario->borrar_Usuario($_REQUEST['documento']);	


?>