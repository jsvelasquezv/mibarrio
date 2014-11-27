<?php		
	    include_once '../modelos/Modelo_Producto.php';
	    include_once '../controladores/Controlador_Producto.php';
	    include_once '../modelos/Modelo_Factura.php';				
	    include_once '../controladores/Controlador_Factura.php';

	$id_factura =  $_REQUEST['id_factura'];// el id de la factura que se va a registrar 
        $c_factura = new Controlador_Factura();
        $m_factura = new Modelo_Factura($c_factura);
        $resultado = $m_factura->registrarFactura($id_factura);
        var_dump($resultado);
        header("Location: ../pages/Registrar_Factura.php?gestion=$resultado&&id_Factura=$id_factura");

?>
