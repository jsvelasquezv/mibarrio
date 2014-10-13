<?php

class Controlador_Perfil{
	private $id;
	private $nombre; 				// String
	private $permiso_Sistema;		// boolean
	private $permiso_Perfiles;		// boolean
	private $permiso_Productos;		// boolean
	private $permiso_Inventario;	// boolean
	private $permiso_Facturacion; 	// boolean
	private $permiso_Reportes;		// boolean
	
	public function crear_Perfil($nom, $p_Sistema, $p_Perfiles, $p_Productos,
						$p_Inventario, $p_Facturacion, $p_Reportes=NULL){
		$this->nombre = $nom;
		$this->permiso_Sistema = $p_Sistema;
		$this->permiso_Perfiles = $p_Perfiles;
		$this->permiso_Productos = $p_Productos;
		$this->permiso_Inventario = $p_Inventario;
		$this->permiso_Facturacion = $p_Facturacion;
		$this->permiso_Reportes = $p_Reportes;
		
	}
	
	public function get_ID(){
		return $this->id;
	}
	
	public function get_Nombre(){
		return $this->nombre;
	}
	
	public function get_PermisoSistema(){
		return $this->permiso_Sistema;
	}
	
	public function get_PermisoPerfiles(){
		return $this->permiso_Perfiles;
	}
	
	public function get_PermisoProductos(){
		return $this->permiso_Productos;
	}
	
	public function get_PermisoInventario(){
		return $this->permiso_Inventario;
	}
	
	public function get_PermisoFacturacion(){
		return $this->permiso_Facturacion;
	}
	
	public function get_PermisoReportes(){
		return $this->permiso_Reportes;
	}
	
	

	public function set_ID($_id){
		$this->id = $_id;
	}

	public function set_Nombre($nom){
		$this->nombre = $nom;
	}
	
	public function set_PermisoSistema($p_Sistema){
		$this->permiso_Sistema = $p_Sistema;
	}
	
	public function set_PermisoPerfiles($p_Perfiles){
		$this->permiso_Perfiles = $p_Perfiles;
	}
	
	public function set_PermisoProductos($p_Productos){
		$this->permiso_Productos = $p_Productos;
	}
	
	public function set_PermisoInventario($p_Inventario){
		$this->permiso_Inventario = $p_Inventario;
	}
	
	public function set_PermisoFacturacion($p_Facturacion){
		$this->permiso_Facturacion = $p_Facturacion;
	}
	
	public function set_PermisoReportes($p_Reportes){
		$this->permiso_Reportes = $p_Reportes;
	}
	
}

?>
