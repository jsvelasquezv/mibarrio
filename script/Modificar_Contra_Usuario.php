<?php
	include_once '../modelos/Validacion_Usuario.php';

	$contra_usuario = new Validar_Usuario();
	$contra_usuario->validar_Modificar_Contra($_REQUEST['id'],$_REQUEST['pass']);


?>