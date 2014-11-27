<?php
include_once 'Modelo_Bd.php';
include_once 'Validacion_Datos.php';

class Modelo_Factura{
	private $bd;		// Tipo: BD
	private $factura;	// Tipo: Controlador_Factura
	
	public function __construct($control_Factura){
		$this->bd = new BD("base1","root");
		$this->bd->conectar();
		$this->factura = $control_Factura;
	}
	
	// Void: Buscar los datos de la Factura 
	public function buscar_Factura($id_factura){
		$sql = "";
		$registros = $this->bd->consultar($sql);
		if($reg=mysql_fetch_array($registros)){
		}
	}

	

	
	
	public function actualizar_Factura(){

		// se actualizan los datos de la factura 
		$sql = "UPDATE `factura` SET `IVAtotalfactura`=".$this->factura->get_iva() .",
		`montototalsinIVA`=".$this->factura->get_montosinIva() .",
		`montototalconIVA`=".$this->factura->get_montoconIva() ." WHERE `Idfactura`=".$this->factura->get_idFactura() ;
		if($this->bd->insertar($sql))
			$salida = 7;
		else $salida = 5;

		$sql = "DELETE FROM `listaproductos` WHERE  `Idfactura`=".$this->factura->get_idFactura();
		if($this->bd->insertar($sql))
				$salida = 1;
			else $salida = 7;


		$productos =$this->factura->get_Productos();
		$nummero_de_productos = count($this->factura->get_Productos());
		$sql = "INSERT INTO `listaproductos`(`Idfactura`, `IdProducto`, `cantidadProducto`) VALUES ";
		for($i = 0 ; $i<$nummero_de_productos ; $i++){
			if($i<$nummero_de_productos-1)
			 $sql.="('".$this->factura->get_idFactura()."','".$productos[$i][0]."','".$productos[$i][1]."'),";
			else
				$sql.="('".$this->factura->get_idFactura()."','".$productos[$i][0]."','".$productos[$i][1]."')";
		}
		if($this->bd->insertar($sql))
			$salida = 7;
		else $salida = 6;

		return $salida;
	}
	
	
	public function crear_Factura(){
			$sql = "INSERT INTO 
				`factura`( `Idfactura`,`fechaventa`, `Idvendedor`, `Idcliente`, `IVAtotalfactura`, `montototalsinIVA`, `montototalconIVA`, `estado`) 
				VALUES 
			   ('".$this->factura->get_idFactura() .
			   	"','".$this->factura->get_FechaVenta() .
			   	"','".$this->factura->get_idVendedor() .
				"','".$this->factura->get_idCliente() .
				"','".$this->factura->get_iva() .
				"','".$this->factura->get_montosinIva() .
				"','".$this->factura->get_montoconIva() .
				"','".$this->factura->get_Estado() .
				"')";
			if($this->bd->insertar($sql))
				$salida = 1;
			else $salida = 2;

			$productos =$this->factura->get_Productos();
			$nummero_de_productos = count($this->factura->get_Productos());

			$sql = "INSERT INTO `listaproductos`(`Idfactura`, `IdProducto`, `cantidadProducto`) VALUES ";
			for($i = 0 ; $i<$nummero_de_productos ; $i++){
				if($i<$nummero_de_productos-1)
				 $sql.="('".$this->factura->get_idFactura()."','".$productos[$i][0]."','".$productos[$i][1]."'),";
				else
					$sql.="('".$this->factura->get_idFactura()."','".$productos[$i][0]."','".$productos[$i][1]."')";


			}
			if($this->bd->insertar($sql))
				$salida = 1;
			else $salida = 3;

			$this->bd->desconectar();


		return $salida;
	}
	

	public function desconectarBD(){
		$this->bd->desconectar();
	}

	public function mostrar_Todos(){

		$sql = "select * from factura";

		$registros = $this->bd->consultar($sql);

	    for($i = 0; $row = mysql_fetch_row($registros); $i++){

	        for($j = 0; $j < 16; $j++){
	            
	            $ar[$i][$j] = $row[$j];

	        }
	    }

	    return $ar;
	}
	public function getControladorFactura(){
		return $this->factura;
	}

	public function getNumeroFacturas(){
		$sql = "SELECT max(`Idfactura`) FROM `factura`";
		$row = mysql_fetch_array($this->bd->consultar($sql));
		return $row[0];

	}

	public function infoFacturas(){ // funcion para retornar la informacion de todas las facturas, es usada en la vista visualizar facturas 
		$sql = "SELECT 
		`Idfactura`, `fechaventa`, usuarios.Nombres, clientes.Nombres, `IVAtotalfactura`, `montototalsinIVA`, `montototalconIVA`, `estado` 
		FROM
		 `factura`,`usuarios`,clientes WHERE `Idvendedor`= usuarios.Documento AND `Idcliente`= clientes.Documento AND estado='Sin registra' ORDER BY Idfactura ASC";
		 $registros = $this->bd->consultar($sql);

		for($i = 0; $row = mysql_fetch_row($registros); $i++){
	        for($j = 0; $j < 8; $j++){
	            $ar[$i][$j] = $row[$j];
	        }
	    }
	    return $ar;
	}

	public function infoFactura($id_fac){ // funcion que retorna la informacion de la factura id_fac$sql =
		$sql = "
		SELECT 
			`Idfactura`, `fechaventa`, `Idvendedor` ,usuarios.Nombres, `Idcliente`, clientes.Nombres, `IVAtotalfactura`, `montototalsinIVA`,
		 	`montototalconIVA`, `estado` 
		FROM `factura`,`usuarios`,clientes 
		WHERE `Idvendedor`= usuarios.Documento AND `Idcliente`= clientes.Documento AND Idfactura = $id_fac AND estado='Sin registra' ";

		 $registros = $this->bd->consultar($sql);

		for($i = 0; $row = mysql_fetch_row($registros); $i++){
	        for($j = 0; $j < 10; $j++){
	            $ar[$i][$j] = $row[$j];
	        }
	    }
	    return $ar;
	}
	public function productos_Factura($id_fac){ // funcion que retorna los productos dependiendo del id de una factura 

		$sql = "SELECT `id_principal`, `Idfactura`, `IdProducto`, `cantidadProducto`, precioVenta FROM `listaproductos`, productos WHERE IdFactura = $id_fac AND IdProducto = id ";		
		$registros = $this->bd->consultar($sql);
		for($i = 0; $row = mysql_fetch_row($registros); $i++){
	        for($j = 0; $j < 5; $j++){
	            $ar[$i][$j] = $row[$j];
	        }
	    }
	    return $ar;
	}
	public function productos_Factura2($id_fac){ // funcion que retorna los productos dependiendo del id de una factura usada para el modulo de registro factura

	$sql = "SELECT `id_principal`, `Idfactura`, `IdProducto`, `cantidadProducto`, precioVenta , nombre FROM `listaproductos`, productos WHERE IdFactura = $id_fac AND IdProducto = id ";		
	$registros = $this->bd->consultar($sql);
	for($i = 0; $row = mysql_fetch_row($registros); $i++){
        for($j = 0; $j < 6; $j++){
            $ar[$i][$j] = $row[$j];
        }
    }
    return $ar;


	}
	public function borrarproductos($id_factura){
		$sql = "DELETE FROM `listaproductos` WHERE  `Idfactura`=".$id_factura;
		if($this->bd->insertar($sql))
				$salida = 1;
			else $salida = 7;

	}

	public function infoFactura_infoCliente($id_fac){ // funcion que retorna la informacion de la factura id_fac
		
		$sql = "SELECT 
		`Idfactura`, `fechaventa`, usuarios.Nombres, usuarios.Documento ,clientes.Nombres, `IVAtotalfactura`, 
		`montototalsinIVA`, `montototalconIVA`, `estado` , clientes.Apellidos, clientes.Correo_Electronico,
		 clientes.Telefono, clientes.Documento, clientes.Direccion 
		 FROM `factura`,`usuarios`, clientes 
		 WHERE `Idvendedor`= usuarios.Documento AND `Idcliente`= clientes.Documento AND Idfactura=$id_fac 
		 ORDER BY Idfactura ASC";


		$registros = $this->bd->consultar($sql);

		for($i = 0; $row = mysql_fetch_row($registros); $i++){
	        for($j = 0; $j < 14; $j++){
	            $ar[$i][$j] = $row[$j];
	        }
	    }
	    return $ar;
	}

	public function registrarFactura($id_fac){

			$info_Factura = $this->infoFactura_infoCliente($id_fac);
			$info_Productos = $this->productos_Factura2($id_fac);

			$cantidad = true ;// boolean que se cambiara a false si algun producto no tiene la cantidad suficiente en el stock
			for($i = 0; $i<count($info_Productos);$i++){
				if($info_Productos[$i][3]>$this->cantidad_producto($info_Productos[$i][2])){
					$cantidad = false;
				}
			}
			$salida = 0;
			if($cantidad){
				for($i = 0; $i<count($info_Productos);$i++){
				$salida = $this->actualizar_cantidad_producto($info_Productos[$i][2],$info_Productos[$i][3]);
				}
			}else{
				$salida = 3;
			}
			if($salida == 1){
				$sql = "UPDATE `factura` SET `estado`='Registrada' WHERE `idfactura` = $id_fac";
				if($this->bd->insertar($sql))
					$salida = 1;
				else $salida = 2;
			}
		$this->bd->desconectar();
		return $salida;

	}


	public function cantidad_producto($id_producto){

				$sql = "select cantidad from productos where id='".$id_producto."'";
				$precio = mysql_fetch_array($this->bd->consultar($sql));
				return $precio["cantidad"];
	}

	public function actualizar_cantidad_producto($id_pro,$cantidad){// update el produco, cantidad es el numero que se disminuira en la base de datos

		$cantidadFinal = intval($this->cantidad_producto($id_pro))-$cantidad; // se le resta a la cantidad del producto inicial, la cantidad que entro como parametro 
		$sql = "UPDATE `productos` SET `cantidad`=$cantidadFinal WHERE `id` = $id_pro";
		if($this->bd->insertar($sql))
			$salida = 1;
		else $salida = 2;
		return $salida;

	}




	

}

?>
