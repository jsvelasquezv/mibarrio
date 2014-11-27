<?php		
	    include_once '../modelos/Modelo_Producto.php';
	    include_once '../controladores/Controlador_Producto.php';
	    include_once '../modelos/Modelo_Factura.php';				
	    include_once '../controladores/Controlador_Factura.php';

		$tam =  (count($_REQUEST)-4)/2; // numero de productos que tiene la factura 
        if($tam!=0){


		$id_vendedor = $_REQUEST['id_vende'];  // id del vendedor que hizo la factura 
		$id_cliente = $_REQUEST['id_cliente']; // id del cliente que hizo la compra
		$fecha = $_REQUEST['fecha']; // fecha en la que se hizo  la fecha 
		$id_Factura = $_REQUEST['id_Factura'];
		$productos;    // este es un array con los productos y la cantidad de cada producto 
		$p=0;
		for($i = 0 ; $i<$tam; $p++ ){  // este for asigna al array los productos y la cantidad de cada uno de estos  
			if(isset($_REQUEST["producto".$p])){
				$productos[$p][0] = $_REQUEST['producto'.$p];
				$productos[$p][1] = $_REQUEST['cantidad'.$p];
				$i++;
			}
		}
		$estado = "Sin registrar";

	    $c_producto = new Controlador_Producto();
        $m_producto = new Modelo_Producto($c_producto);
        $precios = array(); //arreglo donde se guarda los precios de los productos 
        $valorIva = array(); // arreglo donde se guardaran el valor de iva de los productos 
        $iva = array(); // arreglo donde se guardara el "SI o "NO"  de si los productos tienen iva o no 
        $aux = array(); // variable auxiliar para sacar los parametros 
        for($i = 0; $i<count($productos); $i++ ){
        
        	$aux = $m_producto->selec_precio_iva($productos[$i][0]);
        	$precios[$i] = intval($aux[0])*intval($productos[$i][1]);
        	$valorIva[$i] = $aux[1];
        	$iva[$i] = $aux[2];

        } 

        $precio_sin_iva = array(); // array donde se guarda los precios sin iva de los productos 
        $aux2 ;// variable auxiliar 
        $aux3 ;
        for($i = 0; $i<count($productos); $i++ ){
        	if($iva[$i]=="SI"){
        		$aux1 = intval($precios[$i]);
        		$aux2 = 1-(intval($valorIva[$i]))/100;
        		$precio_sin_iva[$i] = $aux1*$aux2;
        	}else{
        		$aux1 = intval($precios[$i]);
        		$precio_sin_iva[$i] = $aux1;
        	}

        }

        $suma_con_iva = 0; 	// el valor total de la factura incluyendo iva 
        $suma_sin_iva = 0; 	// el valor total de la factura sin incluir iva 
        $total_iva = 0; 	// el valor total del iva cobrado en la factura  

        for($i = 0; $i<count($precio_sin_iva); $i++ ){

        	$suma_con_iva += $precios[$i];
        	$suma_sin_iva += $precio_sin_iva[$i];

        }

        $total_iva = $suma_con_iva-$suma_sin_iva;


        /*echo $suma_con_iva."     ".$suma_sin_iva."      ".$total_iva."           " ;
        var_dump($precios);
        var_dump($valorIva);
        var_dump($iva);
        var_dump($precio_sin_iva);*/
        $c_factura =  new Controlador_Factura();
        $c_factura->Crear_Factura($id_Factura,$id_vendedor,$id_cliente,$fecha,$productos,$total_iva,$suma_con_iva,$suma_sin_iva,$estado);
        $m_factura = new Modelo_Factura($c_factura);
        //$m_factura->borrarproductos($id_Factura);
        $resultado = $m_factura->actualizar_Factura();
        //echo $resultado;
        //var_dump($resultado);
        header("Location: ../pages/Crear_Factura.php?gestion=$resultado");
        }else
                header("Location: ../pages/Crear_Factura.php?gestion=4");

?>
