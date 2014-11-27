<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../controladores/Controlador_Categoria.php';
include_once 'Modelo_Categoria.php';


class Validar_Categoria{

	public function validar_Crear_Categoria($id, $nombre, 
		$descripcion)
	{
		$c_categoria = new Controlador_Categoria();
		$c_categoria->crear_Categoria($id, $nombre, 
			$descripcion);
		$m_categoria=new Modelo_Categoria($c_categoria);
		$info = $m_categoria->crear_Categoria($c_categoria);
			header("Location: ../pages/Crear_Categoria.php?gestion=".$info);
	}

	public function validar_Modificar_Categoria($id, $nombre, 
		$descripcion)
	{
			// se crea el objeto con los datos del form
		$new_c_categoria = new Controlador_Categoria();
		$new_c_categoria->crear_Categoria($id, $nombre, $descripcion);
		$new_m_categoria=new Modelo_Categoria($new_c_categoria);
		// se modifica el perfil, y el resultado de la operacion de asigna a una variable
		$info = $new_m_categoria->actualizar_Datos_Categoria($id);
		/*if( == "exito"){
			header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}else{*/

			// la variable es usada para arrojar un resultado en Crear_Perfil.php
		header("Location: ../pages/Modificar_Categoria.php?gestion=".$info);
	}
}

?>