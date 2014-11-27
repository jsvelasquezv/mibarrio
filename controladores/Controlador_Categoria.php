<?php
	
	class Controlador_Categoria
	{
		private $id; // int
		private $nombre=""; // string
		private $descripcion=""; // string
		
		public function crear_Categoria($id, $nombre, $descripcion)
		{
			$this->id=$id;
			$this->nombre=$nombre;
			$this->descripcion=$descripcion;
		}

		public function get_Id()
		{
			return $this->id;
		}

		public function get_Nombre()
		{
			return $this->nombre;
		}

		public function get_Descripcion()
		{
			return $this->descripcion;
		}

		public function set_Id($id)
		{
			$this->id=$id;
		}

		public function set_Nombre($nombre)
		{
			$this->nombre=$nombre;
		}

		public function set_Descripcion($descripcion)
		{
			$this->descripcion=$descripcion;
		}

		public function validar()
		{
			
		}
	}

?>	