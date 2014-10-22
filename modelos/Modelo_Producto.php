<?php
include_once 'Modelo_Bd.php';
include_once '../class/Validacion_Datos.php';

class Modelo_Producto{
	private $bd;		// Tipo: BD
	private $producto;	// Tipo: Controlador_Usuario
	
	public function __construct($control_Producto){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->producto = $control_Producto;
	}
	
	// Void: Buscar los datos del producto dependiendo del Nombre de producto
	public function buscar_Producto($id){
		$sql = "select id, nombre, descripcion, categoria, iva, valorIva, precioCompra,
			precioVenta, cantidad, estado
			from productos where id='$id'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->producto->set_Id($reg['id']);
			$this->producto->set_Nombre($reg['nombre']);
			$this->producto->set_Categoria($reg['categoria']);
			$this->producto->set_Iva($reg['iva']);
			$this->producto->set_valorIva($reg['valorIva']);
			$this->producto->set_Precio_Compra($reg['precioCompra']);
			$this->producto->set_Precio_Venta($reg['precioVenta']);
			$this->producto->set_Cantidad($reg['cantidad']);
			$this->producto->set_Estado($reg['estado']);		
		}
	}

	// Void: Buscar los datos del usuario dependiendo del Documento de usuario
	public function buscar_Producto2($id){
		$sql = "select id, nombre, descripcion, categoria, iva, valorIva, precioCompra,
			precioVenta, cantidad, estado
			from productos where id='$id'";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
			$this->producto->set_Id($reg['id']);
			$this->producto->set_Nombre($reg['nombre']);
			$this->producto->set_Categoria($reg['categoria']);
			$this->producto->set_Iva($reg['iva']);
			$this->producto->set_valorIva($reg['valorIva']);
			$this->producto->set_Precio_Compra($reg['precioCompra']);
			$this->producto->set_Precio_Venta($reg['precioVenta']);
			$this->producto->set_Cantidad($reg['cantidad']);
			$this->producto->set_Estado($reg['estado']);		
		}
	}
	
	// int: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Producto($id){
		$sql = "UPDATE usuarios SET id='".$this->producto->get_Id()."',
									nombre='".$this->producto->get_Nombre()."',
									descripcion = '".$this->producto->get_Apellidos()."',
									categoria = '".$this->producto->get_Categoria()."',									
									iva = '".$this->producto->get_Iva()."',
									valorIva = '".$this->producto->get_valor_Iva()."',
									precioCompra = '".$this->producto->get_Precio_Compra()."',
									precioVenta = '".$this->producto->get_Precio_Venta()."',
									cantidad = '".$this->producto->get_Cantidad()."',
									estado = '".$this->producto->get_Estado()."',					
			 WHERE id='".$id."';";

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(!(strlen($this->usuario->get_Nid()) > 7))			$salida = 2;
		elseif(!(strlen($this->usuario->get_Nombres()) > 1))	$salida = 3;
		elseif(!(strlen($this->usuario->get_Apellidos()) > 1))	$salida = 4;
		elseif(!(strlen($this->usuario->get_Usuario()) > 4))	$salida = 5;
		elseif(!(strlen($this->usuario->get_Password()) > 4))	$salida = 6;
		elseif(!(strlen($this->usuario->get_Pregunta()) > 9))	$salida = 7;
		elseif(!(strlen($this->usuario->get_Respuesta()) > 1))	$salida = 8;
		elseif(!(strlen($this->usuario->get_TipoId()) > 1))		$salida = 9;
		elseif(!(strlen($this->usuario->get_Ciudad()) > 1))		$salida = 10;
		elseif(!(strlen($this->usuario->get_Direccion()) > 2))	$salida = 11;
		elseif(!(strlen($this->usuario->get_Edad()) > 0))		$salida = 12;
		elseif(!(strlen($this->usuario->get_Foto()) > 2))		$salida = 13;
		elseif(!(strlen($this->usuario->get_Celular()) > 7))	$salida = 14;
		elseif(!(strlen($this->usuario->get_Email()) > 6))		$salida = 15;
		elseif(!(strlen($this->usuario->get_Genero()) > 0))		$salida = 16;
		elseif(!(strlen($this->usuario->get_Perfil()) > 0))		$salida = 17;
		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Number($this->usuario->get_Nid())))				$salida = 18;
		elseif(!($valida->is_Alphanumeric($this->usuario->get_Usuario())))		$salida = 19;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Nombres())))		$salida = 20;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Apellidos())))		$salida = 21;
		elseif(!($valida->is_Alphanumeric($this->usuario->get_Password())))		$salida = 22;
		elseif(!($valida->is_Alphanumeric($this->usuario->get_Respuesta())))	$salida = 24;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Ciudad())))			$salida = 25;
		elseif(!($valida->is_Number($this->usuario->get_Edad())))				$salida = 26;
		elseif(!($valida->is_Number($this->usuario->get_Celular())))			$salida = 28;


		///////////////////////////////////////////////////////////////////////////

		
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 31;
		

		return $salida;
	}
	
	// int: Actualiza la BD con los datos que hay en el Controlador: usuario
	public function actualizar_Datos_Usuario2($id){
		$sql = "UPDATE usuarios SET id='".$this->producto->get_Id()."',
									nombre='".$this->producto->get_Nombre()."',
									descripcion = '".$this->producto->get_Apellidos()."',
									categoria = '".$this->producto->get_Categoria()."',									
									iva = '".$this->producto->get_Iva()."',
									valorIva = '".$this->producto->get_valor_Iva()."',
									precioCompra = '".$this->producto->get_Precio_Compra()."',
									precioVenta = '".$this->producto->get_Precio_Venta()."',
									cantidad = '".$this->producto->get_Cantidad()."',
									estado = '".$this->producto->get_Estado()."',			
			 WHERE id=".$id."";

		//echo $sql;
		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(!(strlen($this->usuario->get_Nid()) > 7))			$salida = 2;
		elseif(!(strlen($this->usuario->get_Nombres()) > 1))	$salida = 3;
		elseif(!(strlen($this->usuario->get_Apellidos()) > 1))	$salida = 4;
		elseif(!(strlen($this->usuario->get_Usuario()) > 4))	$salida = 5;
		elseif(!(strlen($this->usuario->get_Pregunta()) > 9))	$salida = 7;
		elseif(!(strlen($this->usuario->get_Respuesta()) > 1))	$salida = 8;
		elseif(!(strlen($this->usuario->get_Ciudad()) > 1))		$salida = 10;
		elseif(!(strlen($this->usuario->get_Direccion()) > 2))	$salida = 11;
		elseif(!(strlen($this->usuario->get_Edad()) > 0))		$salida = 12;
		elseif(!(strlen($this->usuario->get_Foto()) > 2))		$salida = 13;
		elseif(!(strlen($this->usuario->get_Celular()) > 7))	$salida = 14;
		elseif(!(strlen($this->usuario->get_Email()) > 6))		$salida = 15;
		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Number($this->usuario->get_Nid())))				$salida = 18;
		elseif(!($valida->is_Alphanumeric($this->usuario->get_Usuario())))		$salida = 19;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Nombres())))		$salida = 20;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Apellidos())))		$salida = 21;
		elseif(!($valida->is_Alphanumeric($this->usuario->get_Respuesta())))	$salida = 24;
		elseif(!($valida->is_Alphabetic($this->usuario->get_Ciudad())))			$salida = 25;
		elseif(!($valida->is_Number($this->usuario->get_Edad())))				$salida = 26;
		elseif(!($valida->is_Number($this->usuario->get_Celular())))			$salida = 28;


		///////////////////////////////////////////////////////////////////////////

		
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 31;
		

		return $salida;
	}
	
	public function crear_Producto(){
		echo 'Valor de Id= '.$this->producto->get_Id();
		$sql = "INSERT INTO productos (`id`, `nombre`, `descripcion`, `categoria`, 
			`iva`, `valorIva`, `precioCompra`, `precioVenta`, `cantidad`, `estado`) 
		SELECT '".$this->producto->get_Id()."',
									'".$this->producto->get_Nombre()."',
									'".$this->producto->get_Descripcion()."',
									'".$this->producto->get_Categoria()."',
									'".$this->producto->get_Iva()."',
									'".$this->producto->get_valor_Iva()."',
									'".$this->producto->get_Precio_Compra()."',
									'".$this->producto->get_Precio_Venta()."',
									'".$this->producto->get_Cantidad()."',
									'".$this->producto->get_Estado()."';";

		// 							,
		// 							ID 
		// FROM perfiles WHERE perfiles.Nombre='".$this->producto->get_Categoria()."'

		$salida = 0;
		$valida = new Validacion_Datos(); // <- Para validar los tipos de datos
		// Validacion de los minimos
		if(((strlen($this->producto->get_Id()) > 15)||(strlen($this->producto->get_Id()) < 2))) $salida = 2;
		elseif(((strlen($this->producto->get_Nombre()) > 30)||(strlen($this->producto->get_Nombre()) < 4))) $salida = 3;
		elseif(((strlen($this->producto->get_Descripcion()) > 500)||(strlen($this->producto->get_Descripcion()) < 15)))	$salida = 4;
		elseif(((strlen($this->producto->get_valor_Iva()) > 6)||(strlen($this->producto->get_valor_Iva()) < 3)))	$salida = 5;
		elseif(((strlen($this->producto->get_Precio_Compra()) > 10)||(strlen($this->producto->get_Precio_Compra()) < 2))) $salida = 6;
		elseif(((strlen($this->producto->get_Precio_Venta()) > 10)||(strlen($this->producto->get_Precio_Venta()) < 2))) $salida = 7;
		elseif(((strlen($this->producto->get_Cantidad()) > 10)||(strlen($this->producto->get_Cantidad()) < 2))) $salida = 8;

		// Validacion de los tipos de datos (Numérico,Alfabético,Alfanumérico)
		elseif(!($valida->is_Alphanumeric($this->producto->get_Id()))) $salida = 9;
		elseif(!($valida->is_Alphabetic($this->producto->get_Nombre()))) $salida = 10;
		elseif(!($valida->is_Alphanumeric($this->producto->get_Descripcion()))) $salida = 11;
		elseif(!($valida->is_Number($this->producto->get_Precio_Compra()))) $salida = 12;
		elseif(!($valida->is_Number($this->producto->get_Precio_Venta()))) $salida = 13;
		elseif(!($valida->is_Number($this->producto->get_Cantidad()))) $salida = 14;


		///////////////////////////////////////////////////////////////////////////
	
		elseif($this->bd->insertar($sql))
			$salida = true;
		else $salida = 15;
		

		return $salida;
	}

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "select * from usuarios";/*
		$sql = "SELECT `Documento`, `Nombres`, `Apellidos`, `Usuario`, `Password`, `Pregunta`, `Respuesta`, 
		`Tipo_Documento`, `Ciudad`, `Direccion`, `Edad`, `Foto`, `Telefono`, `Correo_Electronico`, `Genero`, 
		`Nombre` FROM `usuarios`,`perfiles` WHERE (usuarios.perfiles_Nombre=perfiles.ID)";*/
		$registros = $this->bd->consultar($sql);
		$ar;

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 16; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}
	
}

?>
