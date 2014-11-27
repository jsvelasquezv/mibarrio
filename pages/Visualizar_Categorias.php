<?php

	include ("perfil.php"); 
	include_once("../modelos/Modelo_Categoria.php");
	include_once("../controladores/Controlador_Categoria.php");

	echo"<div class='row well'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$recibe2 = $recibe_pagina;
	$recibe_pagina2=$recibe_pagina;
	$tam = 2;
 	if($c_perfil->get_PermisoInventario()){
	echo"<form action='Buscar_Categoria.php?page=1' method='post' class='form-horizontal'>
	<fieldset>";
	echo "<div class='form-group'>
		<div class='col-lg-3'>
			<input type='text' class='form-control 'name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
		 </div>
		 <div class='col-lg-2'>
			<input type='submit' name='buscar' class='btn btn-primary' value='Buscar'>
		</div>
	</div>";
	echo "<div><table border=1 class='table table-striped table-hover table-condensed'>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id</font></td>	
			<td><font size=$tam>Nombre</font></td>
			<td><font size=$tam>Descripcion</font></td>	
		</tr>
			</font> 
	";
 		echo "</fieldset></form>";
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
		echo "</table>";		
 		if($fin2 != 0){
 			$recibe_pagina2--;
 			echo '
 					<div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Categorias.php?page='.$recibe_pagina2.'" class="btn btn-primary">
 						Anterior
					</font></a></div> 			';
 		}
 		
 		if($fin < $tam_categorias){
 			$recibe_pagina++;
 			echo '
 					<div class="eliminar"><font size=$tam ><center>
 					<a href = "Visualizar_Categorias.php?page='.$recibe_pagina.'" class="btn btn-primary">
 						Siguiente
					</font></a></div>
 			';
 		}
 	    //echo '<tr>';

 	}
	echo "</div>";	
?>
        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>
    </body>
</html>