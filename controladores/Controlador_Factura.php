<?php
//controlador factura
	class Controlador_Factura
	{
		private $idCliente;    
		private $idVendedor;
		private $idFactura;
		private $fechaVenta;
		private $productos; // arreglo con el id de los productos y cantidad de cada uno 
		private $iva;      // valor total del iva cobrado en la factura 
		private $montoconIva;
		private $montosinIva;
		private $estado;
	



	public function __construct(){
		$this->idVendedor = "";
		$this->idCliente ="";
		$this->fechaVenta = "";
		$this->productos = "";
		$this->iva = "";
		$this->montoconIva = "";
		$this->montosinIva = "";
		$this->estado = "";
	}
	public function Crear_Factura($idf,$idV,$idC,$fecha,$Pro,$iva,$mConIva,$mSiniva,$esta){
		$this->idFactura = $idf;
		$this->idVendedor = $idV;
		$this->idCliente = $idC;
		$this->fechaVenta = $fecha;
		$this->productos = $Pro;
		$this->iva = $iva;
		$this->montoconIva = $mConIva;
		$this->montosinIva = $mSiniva;
		$this->estado = $esta;
	}

	public function get_idCliente(){
		return $this->idCliente;
	}
	
	public function get_idVendedor(){
		return $this->idVendedor;
	}
	
	public function get_idFactura(){
		return $this->idFactura;
	}
	
	public function get_FechaVenta(){
		return $this->fechaVenta;
	}

	public function get_iva(){
		return $this->iva;
	}

	public function get_montoconIva(){
		return $this->montoconIva;
	}

	public function get_montosinIva(){
		return $this->montosinIva;
	}

	public function get_Productos(){
		return $this->productos;
	}

	public function get_Estado(){
		return $this->estado;
	}


	public function set_idCliente($idCliente){
		$this->idCliente = $idCliente;
	}

	public function set_idVendedor($idVendedor){
		$this->idVendedor = $idVendedor;
	}

	public function set_idFactura($idFactura){
		$this->idFactura = $idFactura;
	}
	
	public function set_fechaVenta($fechaVenta){
		$this->fechaVentana = $fechaVenta;
	}
	
	public function set_idiva($iva){
		$this->iva = $iva;
	}

	public function set_montoconIva($montoconIva){
		$this->montoconIva = $montoconIva;
	}

	public function set_montosinIva($montosinIva){
		$this->montosinIva = $montosinIva;
	}
	
	public function set_Productos($prd){
		$this->productos = $prd;
	}

	public function set_Estado($est){
		$this->productos = $est;
	}

}
?>