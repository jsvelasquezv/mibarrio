<?php
	//se incluye el archivo perfil.php que contiene el menu entre otros
	include ("perfil.php"); 
	include_once'../modelos/Modelo_Producto.php';

	//se inicia la div del contenido, el css indica donde va ubicada.
	echo"<div class='row well'>";
	$m_producto = new Modelo_Producto("");
	///////////////////////////////////////////////////////////////////////////
	// Funcion que retorna true si el haystack empieza por el needle
	function startsWith($haystack, $needle)
	{
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}
	///////////////////////////////////////////////////////////////////////////
	//se asigna a la variable buscar el nombre
	$buscar = strtolower($_REQUEST['nombre']);
	echo "<p class='label-control'>Buscando el nombre: '$buscar'<p>";

	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$tam = 2;
	echo "<div ><table border=1 class='table table-striped table-hover '>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id</font></td>
			<td><font size=$tam>Nombre</font></td>
			<td><font size=$tam>Descripcion</font></td>
			<td><font size=$tam>Categoria</font></td>
			<td><font size=$tam>Iva</font></td>
			<td><font size=$tam>Valor Iva</font></td>
			<td><font size=$tam>Precio Compra</font></td>
			<td><font size=$tam>Precio Venta</font></td>
			<td><font size=$tam>Cantidad</font></td>
			<td><font size=$tam>Estado</font></td>
		</tr>
			</font> 
	";
	//se verifica el permiso del usuario
 	if($c_perfil->get_PermisoInventario()){
 		// se inicia el form con el campo para buscar el usuario por el nombre
 		// y tambien el boton para enviar lo escrito por el usuario
 		echo"<form action='Buscar_Producto.php?page=1' method='post'>";
 		echo "
		<div class='form-group'>
	 		<div class='col-lg-6'>
		 			<input type='text' name='nombre' class='form-control' for='inputDefault' placeholder='Escriba el nombre a buscar' required='required'/>
		 	</div>		
	 			<input type='submit' name='buscar' class='btn btn-primary' value='Buscar'>
 		</div>
 			";
 		echo "</form>";
 		// se llaman a todos los usuarios
 		$producto_arr = $m_producto->mostrar_Todos();
 		$productos;
 		$tam_producto = count($producto_arr);

 		// For para descartar los producto que no empiezan con el 
 		// nombre que el usuario escribió en el campo de buscar
 		$posicion_buscar_Categoria = 0;
 		$posicion_buscar_Categoria2 = false;
 		for($i = 0; $i < $tam_producto; $i++){
			$t_nombre = strtolower($producto_arr[$i][1]);  //strtolower es para pasar todo a minusculas
			if(startsWith($t_nombre,$buscar)){
				$posicion_buscar_Categoria2 = true;
		        for($j = 0; $j < 10; $j++)    
		            $productos[$posicion_buscar_Categoria][$j] = $producto_arr[$i][$j];
				$posicion_buscar_Categoria++;
 			}
 		}
 		if($posicion_buscar_Categoria2)
 			$tam_producto = count($productos);
 		else $tam_producto = 0;

 		for($i = 0; $i < $tam_producto; $i++){
			echo "
				<tr>
					<td><div><font size=1><center>
						<a href='Visualizar_Producto.php?gestion=".$productos[$i][0]."'>
						Editar<br></a>
						<a href='Aumentar_Stock.php?gestion=".$productos[$i][0]."'>
						Stock</a></center></font></div></td>
					<td><font size=$tam>".$productos[$i][0]."</font></td>  
					<td><font size=$tam>".$productos[$i][1]."</font></td>
					<td><font size=$tam>".$productos[$i][2]."</font></td>
					<td><font size=$tam>".$productos[$i][3]."</font></td>
					<td><font size=$tam>".$productos[$i][4]."</font></td>
					<td><font size=$tam>".$productos[$i][5]."</font></td>
					<td><font size=$tam>".$productos[$i][6]."</font></td>
					<td><font size=$tam>".$productos[$i][7]."</font></td>
					<td><font size=$tam>".$productos[$i][8]."</font></td>
					<td><font size=$tam>".$productos[$i][9]."</font></td>				
				</tr>";
 		}
		echo "</table>";	
 	}
	echo "</table></div>";	
?>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/npm.js"></script>
	</body>
</html>