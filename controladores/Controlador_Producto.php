<?php
	class Controlador_Producto
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
		private $valorIva;
		private $estado; // bool

		public function crear_Producto($id, $nombre, $descripcion, $categoria, $iva, $valorIva, $precioCompra, 
		$precioVenta, $cantidad, $estado)
		{
			$this->id=$id;
			$this->nombre=$nombre; 
			$this->descripcion=$descripcion; 
			$this->categoria=$categoria; 
			$this->iva=$iva; 
			$this->valorIva=$valorIva;
			$this->precioCompra=$precioCompra; 
			$this->precioVenta=$precioVenta; 
			$this->cantidad=$cantidad; 
			$this->estado=$estado;
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

		public function get_Categoria()
		{
			return $this->categoria;
		}

		public function get_Valor_Precio()
		{
			return $this->valorPrecio;
		}

		public function get_Precio_Compra()
		{
			return $this->precioCompra;
		}

		public function get_Precio_Venta()
		{
			return $this->precioVenta;
		}

		public function get_Cantidad()
		{
			return $this->cantidad;
		}

		public function get_Iva()
		{
			return $this->iva;
		}

		public function get_Valor_Iva()
		{
			return $this->valorIva;
		}

		public function get_Estado()
		{
			return $this->estado;
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

		public function set_Categoria($categoria)
		{
			$this->categoria=$categoria;
		}

		public function set_Valor_Precio($valorPrecio)
		{
			$this->valorPrecio=$valorPrecio;
		}

		public function set_Precio_Venta($precioVenta)
		{
			$this->precioVenta=$precioVenta;
		}

		public function set_Precio_Compra($precioCompra)
		{
			$this->precioCompra=$precioCompra;
		}

		public function set_Cantidad($cantidad)
		{
			$this->cantidad=$cantidad;
		}

		public function set_Iva($iva)
		{
			$this->iva=$iva;
		}

		public function set_Valor_Iva($valorIva)
		{
			$this->valorIva=$valorIva;
		}

		public function set_Estado($estado)
		{
			$this->estado=$estado;
		}
	}
?>