<?php
	/**
	* 
	*/
	class ClassName Controlador_Producto
	{
		private $id; // int
		private $nombre; // int
		private $descripcion; //string
		private $categoria; //string
		private $valorPrecio; //string
		private $precioCompra; //string
		private $precioVenta; //string
		private $cantidad; //string
		private $iva; // bool
		private $estado; // bool
		function __construct(argument)
		{
			
		}
		
		public function Controlador_Producto()
		{
			
		}

		public function Controlador_Producto($id, $nombre, $descripcion, $categoria, $valorPrecio, $precioCompra, $precioVenta, $cantidad, $iva, $estado)
		{
			$this->id=$id;
			$this->nombre=$nombre; 
			$this->descripcion=$descripcion; 
			$this->categoria=$categoria; 
			$this->valorPrecio=$valorPrecio; 
			$this->precioCompra=$precioCompra; 
			$this->precioVenta=$precioVenta; 
			$this->cantidad=$cantidad; 
			$this->iva=$iva; 
			$this->estado=$estado;
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
			return $this->categoria;
		}

		public function getValorPrecio()
		{
			return $this->valorPrecio;
		}

		public function getPrecioCompra()
		{
			return $this->precioCompra;
		}

		public function getPrecioVenta()
		{
			return $this->precioVenta;
		}

		public function getCantidad()
		{
			return $this->cantidad;
		}

		public function getIva()
		{
			return $this->iva;
		}

		public function getEstado()
		{
			return $this->estado;
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

		public function setValorPrecio($valorPrecio)
		{
			$this->valorPrecio=$valorPrecio;
		}

		public function setPrecioVenta($precioVenta)
		{
			$this->precioVenta=$precioVenta;
		}

		public function setPrecioCompra($precioCompra)
		{
			$this->precioCompra=$precioCompra;
		}

		public function setCantidad($cantidad)
		{
			$this->cantidad=$cantidad;
		}

		public function setIva($iva)
		{
			$this->iva=$iva;
		}

		public function setEstado($estado)
		{
			$this->estado=$estado;
		}

		public function validar()
		{
			
		}

	}
?>