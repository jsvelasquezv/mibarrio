<?php

class Controlador_Usuario{
	private $n_Identificacion = "";
	private $usuario = "";
	private $password = "";
	private $nombres = "";
	private $apellidos = "";
	private $direccion = "";
	private $email = "";
	private $tipo_Identificacion = "";
	private $ciudad = "";
	private $pregunta = "";
	private $respuesta = "";
	private $celular = 0;
	private $edad = 0;
	private $foto; // String
	private $genero = 0;
	private $perfil; //String
	
	public function crear_Usuario($n_id, $usu, $pass, $nom, $apell, $dire, $e_mail, $tipo_id, 
						$ciud, $pregun, $respues, $celu, $_edad, $fot, $gene, $perfi){
		$this->n_Identificacion = $n_id;
		$this->password = $pass;
		$this->usuario = $usu;
		$this->nombres = $nom;
		$this->apellidos = $apell;
		$this->direccion = $dire;
		$this->email = $e_mail;
		$this->tipo_Identificacion = $tipo_id;
		$this->ciudad = $ciud;
		$this->pregunta = $pregun;
		$this->respuesta = $respues;
		$this->celular = $celu;
		$this->edad = $_edad;
		$this->foto = $fot;
		$this->genero = $gene;
		$this->perfil = $perfi;
		
	}
	
	public function get_Nid(){
		return $this->n_Identificacion;
	}
	
	public function get_Nombres(){
		return $this->nombres;
	}
	
	public function get_Apellidos(){
		return $this->apellidos;
	}
	
	public function get_Usuario(){
		return $this->usuario;
	}
	
	public function get_Password(){
		return $this->password;
	}
	
	public function get_Pregunta(){
		return $this->pregunta;
	}
	
	public function get_Respuesta(){
		return $this->respuesta;
	}
	
	public function get_TipoId(){
		return $this->tipo_Identificacion;
	}
	
	public function get_Ciudad(){
		return $this->ciudad;
	}
	
	public function get_Direccion(){
		return $this->direccion;
	}
	
	public function get_Edad(){
		return $this->edad;
	}
	
	public function get_Foto(){
		return $this->foto;
	}
	
	public function get_Celular(){
		return $this->celular;
	}
	
	public function get_Email(){
		return $this->email;
	}
	
	public function get_Genero(){
		return $this->genero;
	}
	
	public function get_Perfil(){
		return $this->perfil;
	}
	
	
	
	public function set_Nid($n_id){
		$this->n_Identificacion = $n_id;
	}

	public function set_Usuario($usu){
		$this->usuario = $usu;
	}

	public function set_Password($pass){
		$this->password = $pass;
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
	
	public function set_TipoId($tipo_id){
		$this->tipo_Identificacion = $tipo_id;
	}
	
	public function set_Ciudad($ciud){
		$this->ciudad = $ciud;
	}
	
	public function set_Pregunta($pregun){
		$this->pregunta = $pregun;
	}
	
	public function set_Respuesta($respues){
		$this->respuesta = $respues;
	}
	
	public function set_Celular($celu){
		$this->celular = $celu;
	}
	
	public function set_Edad($_edad){
		$this->edad = $_edad;
	}
	
	public function set_Foto($fot){
		$this->foto = $fot;
	}
	
	public function set_Genero($gene){
		$this->genero = $gene; 
	}
	
	public function set_Perfil($perfi){
		$this->perfil = $perfi; 
	}
	
}

?>
