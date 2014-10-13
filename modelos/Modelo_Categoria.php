<?php
	/**
	* 
	*/
	class Modelo_Categoria
	{
		
		private $controlador_Categoria; // Class Controlador_Categoria
		private $gestor_BD;  
		private $Crear_Categoria;
		private $Validar_Datos;
		private $Modificar_Categoria;


		public function __construct($controlador_Categoria)
		{
			$this->controlador_Categoria=$controlador_Categoria;
		}

		public function crear_Categoria()
		{
		
		}

		public function modificar_Categoria()
		{
			# code...
		}
	}
?>