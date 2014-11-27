<?php
	include_once '../modelos/Validacion_Producto.php';

	$c_usuario = new Validar_Producto();
	$c_usuario->validar_Crear_Producto($_REQUEST['id'], $_REQUEST['nombre'], $_REQUEST['descripcion'], 
		$_REQUEST['categoria'], $_REQUEST['iva'],$_REQUEST['valorIva'], $_REQUEST['precioCompra'], 
		$_REQUEST['precioVenta'], $_REQUEST['cantidad'], $_REQUEST['estado']);
?>