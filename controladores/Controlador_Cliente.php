<?php

class Controlador_Cliente{
	private $documento = "";
	private $nombres = "";
	private $apellidos = "";
	private $direccion = "";
	private $email = "";
	private $celular = 0;

	public function crear_Cliente( $nom, $apell, $e_mail, $celu, $n_id, $dire){
		$this->documento = $n_id;
		$this->nombres = $nom;
		$this->apellidos = $apell;
		$this->direccion = $dire;
		$this->email = $e_mail;
		$this->celular = $celu;
		
	}
	
	public function get_Documento(){
		return $this->documento;
	}
	
	public function get_Nombres(){
		return $this->nombres;
	}
	
	public function get_Apellidos(){
		return $this->apellidos;
	}
	
	public function get_Direccion(){
		return $this->direccion;
	}
	
	public function get_Celular(){
		return $this->celular;
	}
	
	public function get_Email(){
		return $this->email;
	}
	
	
	public function set_Documento($n_id){
		$this->documento = $n_id;
	}

	public function set_Nombres($nom){
		$this->nombres = $nom;
	}
	
	public function set_Apellidos($apell){
		$this->apellidos = $apell;
	}
	
	public function set_Direccion($dire){
		$this->direccion = $dire;
	}
	
	public function set_Email($e_mail){
		$this->email = $e_mail;
	}
	
	public function set_Celular($celu){
		$this->celular = $celu;
	}
	
}

?>
