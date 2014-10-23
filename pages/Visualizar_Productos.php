<?php

	include ("perfil.php");
	include_once '../controladores/Controlador_Producto.php'; 
	include_once '../controladores/Controlador_Categoria.php';
	include_once '../modelos/Modelo_Producto.php';
	include_once '../modelos/Modelo_Categoria.php';

	echo"<div class='contenido'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$recibe2 = $recibe_pagina;
	$recibe_pagina2=$recibe_pagina;
	$tam = 2;
	$c_producto = new Controlador_Producto();
	$m_producto = new Modelo_Producto($c_producto);
	echo "<div style='overflow:scroll'><table border=1 class='CSSTableGenerator'>
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
 	if($c_perfil->get_PermisoInventario()){
 		echo"<form action='Buscar_Producto.php?page=1' method='post'>";
 		echo "
 			<input type='text' name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
 			<input type='submit' name='buscar' class='login login-submit' value='Buscar'>
 			";
 		echo "</form>";
 		$productos = $m_producto->mostrar_Todos();
 		$tam_productos = count($productos);
 		$tam_productos2 = 0;
 		$saltos = 8; // Numero de productos que se muestran por pagina (solo para perfiles con permisos de Sistema)
 		$recibe *= $saltos;
 		$fin = $recibe + $saltos;
 		$recibe2 *= $saltos;
 		$fin2 = $recibe2 - $saltos;
 		for($i = $recibe; $i < $fin && $i < $tam_productos; $i++){
			echo "
				<tr>
					<td><div class='eliminar'><font size=1><center>
						<a href='Modificar_Producto.php?gestion=".$productos[$i][0]."'>
						Editar<br></a>
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
 		echo '<tr>';
 		if($fin2 != 0){
 			$recibe_pagina2--;
 			echo '
 					<td><div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Productos.php?page='.$recibe_pagina2.'">
 						Anterior
					</font></a></div></td>
 			';
 		}
 		
 		if($fin < $tam_productos){
 			$recibe_pagina++;
 			echo '
 					<td ><div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Productos.php?page='.$recibe_pagina.'">
 						Siguiente
					</font></a></div></td>
 			';
 		}
 		echo '<tr>';

		echo "</table>";
 		
 	
 		
 	}else{
 		// Parte para el perfil sin permisos de ver a otros usuarios
		echo "
			<tr>
				<td><div class='eliminar'><font size=1>
					<a href='Modificar_Producto.php?gestion=".$c_producto->get_Id()."'>
					Editar</a></font></div></td>
				<td><font size=$tam>".$c_producto->get_Id()."</font></td>
				<td><font size=$tam>".$c_producto->get_Nombre()."</font></td>
				<td><font size=$tam>".$c_producto->get_Descripcion()."</font></td>
				<td><font size=$tam>".$c_producto->get_Categoria()."</font></td>
				<td><font size=$tam>".$c_producto->get_Iva()."</font></td>
				<td><font size=$tam>".$c_producto->get_Valor_Iva()."</font></td>
				<td><font size=$tam>".$c_producto->get_Precio_Compra()."</font></td>
				<td><font size=$tam>".$c_producto->get_Precio_Venta()."</font></td>
				<td><font size=$tam>".$c_producto->get_Cantidad()."</font></td>
				<td><font size=$tam>".$c_producto->get_Estado()."</font></td>
			</tr>
			</table>
		";
 	
 	}

	echo "</table></div>";	
?>