<?php

	include ("perfil.php");
	include_once '../controladores/Controlador_Producto.php'; 
	include_once '../controladores/Controlador_Categoria.php';
	include_once '../modelos/Modelo_Producto.php';
	include_once '../modelos/Modelo_Categoria.php';

	echo"<div class='row  well'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$recibe2 = $recibe_pagina;
	$recibe_pagina2=$recibe_pagina;
	$tam = 2;
	$c_producto = new Controlador_Producto();
	$m_producto = new Modelo_Producto($c_producto);
 	if($c_perfil->get_PermisoInventario()){
 		echo"<form action='Buscar_Producto.php?page=1' method='post' >";
 		echo "
 		<div class='form-group'>
	 		<div class='col-lg-3'>
		 			<input type='text' name='nombre' class='form-control' for='inputDefault' placeholder='Escriba el nombre a buscar' required='required'/>
		 	</div>		
	 			<input type='submit' name='buscar' class='btn btn-primary' value='Buscar'>
 		</div>";
 		echo "</form>";
	echo "<div class='row table-responsive' ><table border=1 class='table table-striped table-hover table-condensed'>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id</font></td>
			<td><font size=$tam>Nombre</font></td>
			<td><font size=$tam>Descripcion</font></td>
			<td><font size=$tam>Categoria</font></td>
			<td><font size=$tam>Iva</font></td>
			<td><font size=$tam>Valor Iva</font></td>
			<td><font size=$tam>Precio Compra</font></td>
			<td><font size=$tam>Precio Venta</font><>/td
			<td><font size=$tam>Cantidad</font></td>
			<td><font size=$tam>Estado</font></td>
		</tr>
			</font> 
	";
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
					<td><font size=1><center>
							<a  href='Modificar_Producto.php?gestion=".$productos[$i][0]."'>
							Editar</a><br>
							<a href='Aumentar_Stock.php?gestion=".$productos[$i][0]."'>
							 stock</a>

						</center></font>
					</td>
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
		echo "</table>";
 		if($fin2 != 0){
 			$recibe_pagina2--;
 			echo '
 					<div ><font size=$tam >
 					<a class="btn btn-primary" href = "Visualizar_Productos.php?page='.$recibe_pagina2.'">
 						Anterior
					</font></a></div>
 			';
 		}
 		
 		if($fin < $tam_productos){
 			$recibe_pagina++;
 			echo '
 					<div ><font size=$tam >
 					<a class="btn btn-primary"  href = "Visualizar_Productos.php?page='.$recibe_pagina.'">
 						Siguiente
					</font></a></div>
 			';
 		}
 		echo '<tr>';

 		
 	
 		
 	}else{
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
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/npm.js"></script>
	</body>
</html>