<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../controladores/Controlador_Perfil.php';
include_once '../modelos/Modelo_Perfil.php';


class Validar_Perfil{

	public function validar_Crear_Perfil($nombre, $sistema, 
		$perfiles, $productos, $inventario, $facturacion, $reportes)
	{
		$c_perfil = new Controlador_Perfil();
		$c_perfil->crear_Perfil($nombre, $sistema, 
			$perfiles, $productos, $inventario, $facturacion, $reportes);
		$m_perfil=new Modelo_Perfil($c_perfil);
		$info = $m_perfil->crear_Perfil($c_perfil);
		/*if( == "exito"){
			header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}else{*/
			// envia el header con el resultado de la creacion del perfil 
			header("Location: ../pages/Crear_Perfil.php?gestion=".$info);

	}

	public function validar_Modificar_Perfil($nombre, $sistema, 
		$perfiles, $productos, $inventario, $facturacion, $reportes, $idPerfil)
	{
			// se crea el objeto con los datos del form
		$new_c_perfil = new Controlador_Perfil();
		$new_c_perfil->crear_Perfil($nombre, $sistema, 
			$perfiles, $productos, $inventario, $facturacion, $reportes);
		$new_m_perfil=new Modelo_Perfil($new_c_perfil);
		// se modifica el perfil, y el resultado de la operacion de asigna a una variable
		$info = $new_m_perfil->modificar_Perfil($idPerfil);
		/*if( == "exito"){
			header("Location: ../pages/Crear_Perfil.php?gestion=exito");
		}else{*/

			// la variable es usada para arrojar un resultado en Crear_Perfil.php
		header("Location: ../pages/Crear_Perfil.php?gestion=".$info);
	}

	public function validar_Borrar_Perfil($nombre)
	{
		include ("../pages/perfil.php"); 
		if($c_perfil->get_PermisoPerfiles()){
	 	$b_perfil=new Modelo_Perfil();
			echo"$nombre";
			// elimina el perfil con el metodo correspondiente, en caso de arrojar false, regresa a crear perfil 
			// con el error correspondiente
			if($b_perfil->eliminar_Perfil($nombre)){
				header("Location: ../pages/Crear_Perfil.php?gestion=exito2");
			}else{
				header("Location: ../pages/Crear_Perfil.php?gestion=error2");
			}
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";

	}

}

?>