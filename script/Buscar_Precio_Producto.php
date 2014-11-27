<?php
	    include_once '../modelos/Modelo_Producto.php';
	    include_once '../controladores/Controlador_Producto.php';
	    $c_producto = new Controlador_Producto();
        $m_producto = new Modelo_Producto($c_producto);
        $id_producto = $_REQUEST['id_pro']; 
        //echo $id_producto;
       	$precio = $m_producto->precio_Producto($id_producto);
       	echo $precio; 
?>