<?php
include_once 'Modelo_Bd.php';
class Modelo_Logueo{
	private $bd;		// Tipo: BD
	private $logueo;	// Tipo: Controlador_Logueo

	public function __construct($controlador_logueo=NULL){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->logueo = $controlador_logueo;
	}
	
	// Void: Guarda en Controlador_Logueo si el acceso es true o false
	public function valida_Usuario($usuario, $contra){
		$salida = false;
		$sql = "select Usuario,Password from usuarios where Usuario='$usuario'";
		$registros = $this->bd->consultar($sql);
		while($reg=mysql_fetch_array($registros)){
			if($contra == $reg['Password']){
				$salida = true;
				break;
			}
		}
		$this->logueo->set_Acceso($salida);
	}

	// Void: Asigna en Controlador_Logueo la pregunta
	public function pregunta_Usuario($documento){
		$salida = "";
		try{

			$sql = "select Usuario,Pregunta from usuarios where Documento='$documento'";
			$registros = $this->bd->consultar($sql);
			while($reg=mysql_fetch_array($registros)){
				$salida = $reg['Pregunta'];
			}

		}catch(Exception $e){
			echo "Error en la funcion pregunta_Usuario()";
		}

		return $salida;
	}
	
	// void
	public function identifica_Perfil($usuario){
	//Comentario
	//obtiene tipo de perfil
		$perfil="";
		$sql = "select perfiles_Nombre from usuarios where Usuario='$usuario'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$perfil = $reg['perfiles_Nombre'];
				
			
		}
		return $perfil;
	

	}
	
	// String: Devuelve la contraseña si, la pregunta y la respuesta estan bien
	public function restaurar_Contra($documento, $pregunta, $respuesta){
		$salida = "NOt";
		$sql = "select Usuario,Pregunta,Respuesta,Password
		 from usuarios where Documento = '$documento'";
		$registros = $this->bd->consultar($sql);
		if($reg = mysql_fetch_array($registros)){
			$v_pregunta = $reg['Pregunta'];
			$v_respuesta = $reg['Respuesta'];
			$v_contra = $reg['Password'];
			if($v_pregunta == $pregunta && $v_respuesta == $respuesta)
				$salida = $v_contra;
		}
		return $salida;
	}
	
	public function get_Logueo(){
		return $this->logueo;
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	
}
?>