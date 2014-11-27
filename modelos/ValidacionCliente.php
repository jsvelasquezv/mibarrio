<?php
include_once '../controladores/Controlador_Cliente.php';
include_once 'Modelo_Cliente.php';

class Validar_Cliente{


	public function validar_Crear_Cliente($nombre,$apellido,$email,$celular,$documento,$direccion)
	{
		$c_Cliente = new Controlador_Cliente();
		$c_Cliente->crear_Cliente($nombre,$apellido,$email,$celular,$documento,$direccion);
		$m_Cliente = new Modelo_Cliente($c_Cliente);

		$num_error = $m_Cliente->crear_Cliente();

		header("Location: ../pages/Crear_Cliente.php?gestion=".$num_error);
	}
	
}

?>
