<?php

	include_once '../modelos/Validacion_Producto.php';
	
	$crear_Producto = new Validar_Producto();
	$crear_Producto->validar_Modificar_Producto($_REQUEST['id'],$_REQUEST['nombre'],$_REQUEST['descripcion']
		,$_REQUEST['categoria'],$_REQUEST['iva'],$_REQUEST['valorIva'],$_REQUEST['precioCompra'],
		$_REQUEST['precioVenta'],$_REQUEST['cantidad'],$_REQUEST['estado']);
?>