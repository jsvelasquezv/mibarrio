<?php
include_once 'Modelo_Bd.php';
include_once '../class/Validacion_Datos.php';

class Modelo_Categoria{
	private $bd;		// Tipo: BD
	private $categoria;	// Tipo: Controlador_Usuario
	
	public function __construct($control_Categoria){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->categoria = $control_Categoria;
	}
	
	// Void: Buscar los datos del usuario dependiendo del Nombre de usuario
	public function buscar_Categoria($categoria){
		$sql = "select id, nombre, descripcion from categoria where nombre='$categoria'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->categoria->set_Id($reg['id']);
			$this->categoria->set_Nombre($reg['nombre']);
			$this->categoria->set_Descripcion($reg['descripcion']);
		}
	}

	// Void: Buscar los datos del usuario dependiendo del Documento de usuario
	public function buscar_Categoria2($id){
		$sql = "select id, nombre, descripcion from categoria where id='$id'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->categoria->set_Id($reg['id']);
			$this->categoria->set_Nombre($reg['nombre']);
			$this->categoria->set_Descripcion($reg['descripcion']);
		}
	}
		
	// int: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Categoria($id){
		$sql = "UPDATE `base1`.`categoria` SET 
		`nombre` = '".$this->categoria->get_Nombre()."',
		`descripcion` = '".$this->categoria->get_Descripcion()."'
		WHERE `categoria`.`id` = ".$id.";";

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if((strlen($this->categoria->get_Id()) > 13)||(strlen($this->categoria->get_Id()) < 5)) $salida = 2;
		elseif((strlen($this->categoria->get_Nombre()) > 30)||(strlen($this->categoria->get_Nombre()) < 2)) $salida = 3;
		elseif((strlen($this->categoria->get_Descripcion()) > 500)||(strlen($this->categoria->get_Descripcion()) < 15)) $salida = 4;
		
		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Number($this->categoria->get_Id())))				$salida = 5;
		elseif(!($valida->is_Alphanumeric($this->categoria->get_Nombre())))		$salida = 6;
		elseif(!($valida->is_Alphabetic($this->categoria->get_Descripcion())))		$salida = 7;
		
		if($this->bd->insertar($sql))
			$salida = true;
		else $salida = 8;
		

		return $salida;
	}
	
	
	//public function actualizar_Datos_Categoria2($id){}
	
	public function crear_Categoria(){
		$sql = "INSERT INTO categoria (Id, Nombre, Descripcion) 
				VALUES ('".$this->categoria->get_Id()."',
				 '".$this->categoria->get_Nombre()."',
				 '".$this->categoria->get_Descripcion()."')";
		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if((strlen($this->categoria->get_Id()) > 13)||(strlen($this->categoria->get_Id()) < 5)) $salida = 2;
		elseif((strlen($this->categoria->get_Nombre()) > 30)||(strlen($this->categoria->get_Nombre()) < 2)) $salida = 3;
		elseif((strlen($this->categoria->get_Descripcion()) > 500)||(strlen($this->categoria->get_Descripcion()) < 15)) $salida = 4;
		
		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Number($this->categoria->get_Id())))				$salida = 5;
		elseif(!($valida->is_Alphanumeric($this->categoria->get_Nombre())))		$salida = 6;
		elseif(!($valida->is_Alphabetic($this->categoria->get_Descripcion())))		$salida = 7;
		
		///////////////////////////////////////////////////////////////////////////
		
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 8;
		

		return $salida;
	}
	
	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "select * from categoria";
		$registros = $this->bd->consultar($sql);
		$ar[][]="";

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 3; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}
	
}

?>
