<?php
	    include_once '../modelos/Modelo_Producto.php';
	    include_once '../controladores/Controlador_Producto.php';
	    $c_producto = new Controlador_Producto();
        $m_producto = new Modelo_Producto($c_producto);
        $num_producto = $_REQUEST['num_pro'];
        echo $m_producto->crear_select(true,$num_producto);
?>