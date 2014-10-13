<?php
//llamado de los archivos que contienen las clases y metodos necesarios para el logueo
include_once '../controladores/Controlador_Usuario.php';
include_once '../modelos/Modelo_Usuario.php';
include_once '../controladores/Controlador_Perfil.php';
include_once '../modelos/Modelo_Perfil.php';



class Validar_Usuario{

	public function validar_Crear_Usuario($num_id, $usuario, $password, $nombres, $apellidos, 
						$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
						$celular, $edad, $foto, $genero, $perfil)
	{
		$c_usuario = new Controlador_Usuario();
		$c_usuario->crear_usuario($num_id, $usuario, $password, $nombres, $apellidos, 
							$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
							$celular, $edad, $foto, $genero, $perfil);

		$m_usuario = new Modelo_Usuario($c_usuario);

		$num_error = 2;
		$num_error = $m_usuario->crear_Usuario();
		/*echo '<p>docum = '.$num_id;
		echo '<p>numerror = '.$num_error;
		echo '<p>perfil = '.$perfil;*/
		if($num_error == 1){
			header("Location: ../pages/Crear_Usuario.php?gestion=1");
		}else{
			header("Location: ../pages/Crear_Usuario.php?gestion=".$num_error);
		}
	}

	public function validar_Modificar_Usuario($num_id, $usuario, $password, $nombres, $apellidos, 
						$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
						$celular, $edad, $foto, $genero, $perfil)
	{

		$c_perfil = new Controlador_Perfil();
		$m_perfil = new Modelo_Perfil($c_perfil);
		$m_perfil->buscar_Perfil($perfil);
		$c_usuario = new Controlador_Usuario();
		$c_usuario->crear_usuario($num_id, $usuario, $password, $nombres, $apellidos, 
							$direccion, $email, $tipoid, $ciudad, $pregunta, $respuesta, 
							$celular, $edad, $foto, $genero, $c_perfil->get_ID());

		$m_usuario = new Modelo_Usuario($c_usuario);

		$num_error = 1;
		if($perfil)
			$num_error = $m_usuario->actualizar_Datos_Usuario2($_REQUEST['doc']);

		/*echo '<p>docum = '.$_REQUEST['doc'];
		echo '<p>numerror = '.$num_error;
		echo '<p>perfil = '.$perfil;
		*/if($num_error == 1){
			header("Location: ../pages/Modificar_Usuario.php?gestion=1");
		}else{
			header("Location: ../pages/Modificar_Usuario.php?gestion=".$num_error);
		}
	}

	public function validar_Modificar_Contra($num_id,$password)
	{
		$c_usuario = new Controlador_Usuario();
		$m_usuario = new Modelo_Usuario($c_usuario);
		$m_usuario->buscar_Usuario2($num_id);

		$num_error = 2;
		$num_error = $m_usuario->cambiar_Contra($num_id,$password);

		if($num_error == 1){
			header("Location: ../pages/Modificar_Usuario.php?gestion=1");
		}else{
			header("Location: ../pages/Modificar_Usuario.php?gestion=".$num_error);

		}
	}

	public function borrar_Usuario($doc)
	{
		include ("../pages/perfil.php");
		if($c_perfil->get_PermisoPerfiles()){

				if($m_usuario->eliminar_Usuario($doc)){
					header("Location: ../pages/Eliminar_Usuario.php?gestion=exito");
				}else{
					header("Location: ../pages/Eliminar_Usuario.php?gestion=error");
				}
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";

	}


}