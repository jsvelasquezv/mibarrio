<?php
include_once 'Modelo_Bd.php';
include_once 'Validacion_Datos.php';

class Modelo_Cliente{
	private $bd;		// Tipo: BD
	private $cliente;	// Tipo: Controlador_Cliente
	
	public function __construct($control_Cliente){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->cliente = $control_Cliente;
	}
		

	
	public function crear_Cliente(){

		$sql = "INSERT INTO `clientes` (`Documento`, `Nombres`, `Apellidos`,`Direccion`, `Telefono`, `Correo_Electronico`) 
			  VALUES ('".$this->cliente->get_Documento()."',
				'".$this->cliente->get_Nombres()."',
				'".$this->cliente->get_Apellidos()."',
				'".$this->cliente->get_Direccion()."',
				'".$this->cliente->get_Celular()."',
				'".$this->cliente->get_Email()."' );";

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(!(strlen($this->cliente->get_Documento()) > 7))		$salida = 5;
		elseif(!(strlen($this->cliente->get_Nombres()) > 2))	$salida = 2;
		elseif(!(strlen($this->cliente->get_Apellidos()) > 2))	$salida = 3;
		elseif(!(strlen($this->cliente->get_Direccion()) > 2))	$salida = 6;
		elseif(!(strlen($this->cliente->get_Celular()) > 7))	$salida = 7;
		elseif(!(strlen($this->cliente->get_Email()) > 6))		$salida = 4;
		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Number($this->cliente->get_Documento())))			$salida = 8;
		elseif(!($valida->is_Alphabetic($this->cliente->get_Nombres())))		$salida = 9;
		elseif(!($valida->is_Alphabetic($this->cliente->get_Apellidos())))		$salida = 10;
		elseif(!($valida->is_Number($this->cliente->get_Celular())))			$salida = 11;


		///////////////////////////////////////////////////////////////////////////

		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 14;
		//INSERT INTO `clientes` (`Documento`, `Nombres`, `Apellidos`,`Direccion`, `Telefono`, `Correo_Electronico`)  VALUES (123456789, hector, ocampo, carrer, 3124567899, hector@hotmail.com);

		return $salida;
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "select * from clientes";
		$registros = $this->bd->consultar($sql);
		$ar;

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 6; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}

	
}

?>
