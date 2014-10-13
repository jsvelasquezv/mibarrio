<?php
	/**
	* 
	*/
	class Controlador_Inventario
	{
		private $idProducto;
		private $cantidad;
		
		function __construct(argument)
		{
			# code...
		}

		public function Controlador_Inventario()
		{
			
		}

		public function Controlador_Inventario($idProducto)
		{
			$this->idProducto=$idProducto;
		}

		public function getIdProducto()
		{
			return $this->idProducto;
		}

		public function getCantidad()
		{
			return $this->cantidad;
		}

		public function setIdProducto($idProducto)
		{
			$this->idProducto=$idProducto;
		}

		public function setCantidad($cantidad)
		{
			$this->cantidad=$cantidad;
		}

		public function validar()
		{
			
		}
	}
?>