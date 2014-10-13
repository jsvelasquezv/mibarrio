<?php

class BD{
	private $user = "";
	private $pass = "";
	private $base = "";
	private $conexion;
	
	public function __construct($baseNombre, $usu, $contra=""){
		$this->user = $usu;
		$this->pass = $contra;
		$this->base = $baseNombre;
	}
	
	public function conectar(){
		$this->conexion=mysql_connect("localhost",$this->user,$this->pass) 
		  or die("Problemas en la conexion");
		  
		mysql_select_db($this->base,$this->conexion) or
		  die("Problemas en la seleccion de la base de datos");
		  
		//echo "Conexion exitosa a la BD";
	}
	
	public function desconectar(){
		mysql_close($this->conexion);
	}
	
	public function insertar($sql){
		if(mysql_query($sql,$this->conexion) ){
			mysql_close($this->conexion);
			return true;
		}else return false;
	}
	
	public function consultar($sql){
		$registros = mysql_query($sql,$this->conexion) ;
		 
		return $registros;
	}
}

?>
