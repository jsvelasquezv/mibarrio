<?php
	//se incluye el archivo perfil.php que contiene el menu entre otros
	include ("perfil.php"); 
	include_once'../modelos/Modelo_Categoria.php';

	//se inicia la div del contenido, el css indica donde va ubicada.
	echo"<div class='row well'>";
	$m_categoria = new Modelo_Categoria("");
	///////////////////////////////////////////////////////////////////////////
	// Funcion que retorna true si el haystack empieza por el needle
	function startsWith($haystack, $needle)
	{
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}
	///////////////////////////////////////////////////////////////////////////
	//se asigna a la variable buscar el nombre
	$buscar = strtolower($_REQUEST['nombre']);
	echo '<span>Buscando el nombre: '.$buscar.'<span>';

	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$tam = 2;
	echo "<div ><table border=1 class='table table-striped table-hover '>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id</font></td>
			<td><font size=$tam><b>Nombre</b></font></td>
			<td><font size=$tam>Descripcion</font></td>
			
		</tr>
			</font> 
	";
	//se verifica el permiso del usuario
 	if($c_perfil->get_PermisoSistema()){
 		// se inicia el form con el campo para buscar el usuario por el nombre
 		// y tambien el boton para enviar lo escrito por el usuario
 		 echo"<form action='Buscar_Categoria.php?page=1' method='post'>";
 		echo "<div class='col-lg-3'>
 				<input type='text' class='form-control 'name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
 			  </div>
 			<input type='submit' name='buscar' class='btn btn-primary' value='Buscar'>
 			";
 		echo "</form>";

 		// se llaman a todos los usuarios
 		$categoria_arr = $m_categoria->mostrar_Todos();
 		$categoria;
 		$tam_categoria = count($categoria_arr);

 		// For para descartar los categoria que no empiezan con el 
 		// nombre que el usuario escribió en el campo de buscar
 		$posicion_buscar_Categoria = 0;
 		$posicion_buscar_Categoria2 = false;
 		for($i = 0; $i < $tam_categoria; $i++){
			$t_nombre = strtolower($categoria_arr[$i][1]);  //strtolower es para pasar todo a minusculas
			if(startsWith($t_nombre,$buscar)){
				$posicion_buscar_Categoria2 = true;
		        for($j = 0; $j < 3; $j++)    
		            $categoria[$posicion_buscar_Categoria][$j] = $categoria_arr[$i][$j];
				$posicion_buscar_Categoria++;
 			}
 		}
 		if($posicion_buscar_Categoria2)
 			$tam_categoria = count($categoria);
 		else $tam_categoria = 0;

 		for($i = 0; $i < $tam_categoria; $i++){
			echo "
				<tr>
					<td><div class='eliminar'><font size=1><center>
						<a href='Modificar_Categoria.php?gestion=".$categoria[$i][0]."'>
						Editar</a>
					<td><font size=$tam>".$categoria[$i][0]."</font></td>
					<td><font size=$tam>".$categoria[$i][1]."</font></td>
					<td><font size=$tam>".$categoria[$i][2]."</font></td>
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