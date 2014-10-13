<?php
	
	class Controlador_Categoria
	{
		private $id; // int
		private $nombre=""; // string
		private $descripcion=""; // string
		
		public function Controlador_Categoria()
		{
			
		}

		public function Controlador_Categoria($id, $nombre, $descripcion)
		{
			$this->id=$id;
			$this->nombre=$nombre;
			$this->descripcion=$descripcion;
		}

		public function getId()
		{
			return $this->id;
		}

		public function getNombre()
		{
			return $this->nombre;
		}

		public function getDescripcion()
		{
			return $this->descripcion;
		}

		public function setId($id)
		{
			$this->id=$id;
		}

		public function setNombre($nombre)
		{
			$this->nombre=$nombre;
		}

		public function setDescripcion($descripcion)
		{
			$this->descripcion=$descripcion;
		}

		public function validar()
		{
			
		}
	}

?>	