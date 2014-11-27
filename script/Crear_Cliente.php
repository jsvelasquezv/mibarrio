<?php
	include_once '../modelos/ValidacionCliente.php';

	$c_usuario = new Validar_Cliente();
	$c_usuario->validar_Crear_Cliente($_REQUEST['nom'], $_REQUEST['apell'],	 $_REQUEST['e_mail'] , $_REQUEST['celu'] ,
						$_REQUEST['doc'] , $_REQUEST['dire']);

?>