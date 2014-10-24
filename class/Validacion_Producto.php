<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../controladores/Controlador_Producto.php';
include_once '../modelos/Modelo_Producto.php';
include_once '../controladores/Controlador_Categoria.php';
include_once '../modelos/Modelo_Categoria.php';



class Validar_Producto{

	public function validar_Crear_Producto($id, $nombre, $descripcion, $categoria, $iva, $valorIva, $precioCompra, 
		$precioVenta, $cantidad, $estado)
	{
		$c_producto = new Controlador_Producto();
		$c_producto->crear_Producto($id, $nombre, $descripcion, $categoria, $iva, $valorIva, $precioCompra, $precioVenta, 
			$cantidad, $estado);

		$m_producto = new Modelo_Producto($c_producto);

		$num_error = 2;
		$num_error = $m_producto->crear_Producto();
		/*echo '<p>docum = '.$num_id;
		echo '<p>numerror = '.$num_error;
		echo '<p>perfil = '.$perfil;*/
		
		if($num_error == 1){
			header("Location: ../pages/Crear_Producto.php?gestion=1");
		}else{
			header("Location: ../pages/Crear_Producto.php?gestion=".$num_error);
		}
	}

	public function validar_Modificar_Producto($id, $nombre, $descripcion, $categoria, $precioCompra, 
		$precioVenta, $cantidad, $iva, $valorIva, $estado)
	{

		$c_categoria2 = new Controlador_Categoria();
		$m_categoria2 = new Modelo_Categoria($c_categoria2);
		$m_categoria2->buscar_Categoria($categoria);
		$c_producto2 = new Controlador_Producto();
		$c_producto2->crear_Producto($id, $nombre, $descripcion, $categoria, $precioCompra, 
		$precioVenta, $cantidad, $iva, $valorIva, $estado);

		$m_producto2 = new Modelo_Producto($c_producto2);

		$num_error = 1;
		/*echo "$id, $nombre, $descripcion, $categoria, $precioCompra, 
		$precioVenta, $cantidad, $iva, $valorIva, $estado";*/
		if($categoria)
			$num_error = $m_producto2->actualizar_Datos_Producto($_REQUEST['id']);
		if($num_error == 1){
			header("Location: ../pages/Modificar_Producto.php?gestion=1");
		}else{
			header("Location: ../pages/Modificar_Producto.php?gestion=".$num_error);
		}
	}
}