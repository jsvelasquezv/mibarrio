<?php

	include ("perfil.php"); 
	include_once("../modelos/Modelo_Categoria.php");
	include_once("../controladores/Controlador_Categoria.php");

	echo"<div class='contenido'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$recibe2 = $recibe_pagina;
	$recibe_pagina2=$recibe_pagina;
	$tam = 2;
	echo "<div style='overflow:scroll'><table border=1 class='CSSTableGenerator'>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id</font></td>	
			<td><font size=$tam>Nombre</font></td>
			<td><font size=$tam>Descripcion</font></td>	
		</tr>
			</font> 
	";
 	if($c_perfil->get_PermisoInventario()){
 		echo"<form action='Buscar_Categoria.php?page=1' method='post'>";
 		echo "
 			<input type='text' name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
 			<input type='submit' name='buscar' class='login login-submit' value='Buscar'>
 			";
 		echo "</form>";
 		$c_categoria = new Controlador_Categoria();
 		$m_categoria= new Modelo_Categoria($c_categoria);
 		$categorias = $m_categoria->mostrar_Todos();
 		$tam_categorias = count($categorias);
 		$tam_categorias2 = 0;
 		$saltos = 8; // Numero de usuarios que se muestran por pagina (solo para perfiles con permisos de Sistema)
 		$recibe *= $saltos;
 		$fin = $recibe + $saltos;
 		$recibe2 *= $saltos;
 		$fin2 = $recibe2 - $saltos;
 		for($i = $recibe; $i < $fin && $i < $tam_categorias; $i++){
 			$c_perfil2 = new Controlador_Perfil();
 			$m_perfil2 = new Modelo_Perfil($c_perfil2);
 			//$m_perfil2->buscar_Categoria2($categorias[$i][1]);
			echo "
				<tr>
					<td><div class='eliminar'><font size=1><center>
						<a href='Modificar_Categoria.php?gestion=".$categorias[$i][0]."'>
						Editar<br></a>
					<td><font size=$tam>".$categorias[$i][0]."</font></td>  
					<td><font size=$tam>".$categorias[$i][1]."</font></td>	
					<td><font size=$tam>".$categorias[$i][2]."</font></td>
				</tr>"; 			
 		}
 		echo '<tr>';
 		if($fin2 != 0){
 			$recibe_pagina2--;
 			echo '
 					<td><div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Categorias.php?page='.$recibe_pagina2.'">
 						Anterior
					</font></a></div></td>
 			';
 		}
 		
 		if($fin < $tam_categorias){
 			$recibe_pagina++;
 			echo '
 					<td ><div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Categorias.php?page='.$recibe_pagina.'">
 						Siguiente
					</font></a></div></td>
 			';
 		}
 	    echo '<tr>';

		echo "</table>";		
 	}
	echo "</table></div>";	
?>