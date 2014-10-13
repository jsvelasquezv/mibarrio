<?php
	//se incluye el archivo perfil.php que contiene el menu entre otros
	include ("perfil.php"); 

	//se inicia la div del contenido, el css indica donde va ubicada.
	echo"<div class='contenido'>";

	///////////////////////////////////////////////////////////////////////////
	// Funcion que retorna true si el haystack empieza por el needle
	function startsWith($haystack, $needle)
	{
	    return $needle === "" || strpos($haystack, $needle) === 0;
	}
	///////////////////////////////////////////////////////////////////////////
	//se asigna a la variable buscar el nombre
	$buscar = strtolower($_REQUEST['nombre']);
	echo '<p>Buscando el nombre: '.$buscar.'<p>';

	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$tam = 2;
	echo "<div style='overflow:scroll'><table border=1 class='CSSTableGenerator'>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Documento</font></td>
			<td><font size=$tam><b>Nombres</b></font></td>
			<td><font size=$tam>Apellidos</font></td>
			<td><font size=$tam>Usuario</font></td>
			<td><font size=$tam>Password</font></td>
			<td><font size=$tam>Pregunta</font></td>
			<td><font size=$tam>Respuesta</font></td>
			<td><font size=$tam>Tipo Id</font></td>
			<td><font size=$tam>Ciudad</font></td>
			<td><font size=$tam>Direcci&oacute;n</font></td>
			<td><font size=$tam>Edad</font></td>
			<td><font size=$tam>Foto</font></td>
			<td><font size=$tam>Tel&eacute;fono</font></td>
			<td><font size=$tam>Email</font></td>
			<td><font size=$tam>G&eacute;nero</font></td>
			<td><font size=$tam>Perfil</font></td>
		</tr>
			</font> 
	";
	//se verifica el permiso del usuario
 	if($c_perfil->get_PermisoSistema()){
 		// se inicia el form con el campo para buscar el usuario por el nombre
 		// y tambien el boton para enviar lo escrito por el usuario
 		echo"<form action='Buscar.php?page=1' method='post'>";
 		echo "
 			<input type='text' name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required'/>
 			<input type='submit' name='buscar' class='login login-submit' value='Buscar'>
 			";
 		echo "</form>";
 		// se llaman a todos los usuarios
 		$usuarios_arr = $m_usuario->mostrar_Todos();
 		$usuarios;
 		$tam_usuarios = count($usuarios_arr);

 		// For para descartar los usuarios que no empiezan con el 
 		// nombre que el usuario escribió en el campo de buscar
 		$posicion_buscar_usuario = 0;
 		$posicion_buscar_usuario2 = false;
 		for($i = 0; $i < $tam_usuarios; $i++){

			$t_nombre = strtolower($usuarios_arr[$i][1]);  //strtolower es para pasar todo a minusculas
			if(startsWith($t_nombre,$buscar)){
				$posicion_buscar_usuario2 = true;
		        for($j = 0; $j < 16; $j++)    
		            $usuarios[$posicion_buscar_usuario][$j] = $usuarios_arr[$i][$j];

		        
				$posicion_buscar_usuario++;
 			}
 		}
 		if($posicion_buscar_usuario2)
 			$tam_usuarios = count($usuarios);
 		else $tam_usuarios = 0;

 		for($i = 0; $i < $tam_usuarios; $i++){
			echo "
				<tr>
					<td><div class='eliminar'><font size=1><center>
						<a href='Visualizar_Usuario.php?gestion=".$usuarios[$i][0]."'>
						Editar</a>
						<a href='Eliminar_Usuario.php?gestion=".$usuarios[$i][0]."'>
						Eliminar</a></font></center></div></td>
					<td><font size=$tam>".$usuarios[$i][0]."</font></td>
					<td><font size=$tam>".$usuarios[$i][1]."</font></td>
					<td><font size=$tam>".$usuarios[$i][2]."</font></td>
					<td><font size=$tam>".$usuarios[$i][3]."</font></td>
					<td><font size=$tam>".$usuarios[$i][4]."</font></td>
					<td><font size=$tam>".$usuarios[$i][5]."</font></td>
					<td><font size=$tam>".$usuarios[$i][6]."</font></td>
					<td><font size=$tam>".$usuarios[$i][7]."</font></td>
					<td><font size=$tam>".$usuarios[$i][8]."</font></td>
					<td><font size=$tam>".$usuarios[$i][9]."</font></td>
					<td><font size=$tam>".$usuarios[$i][10]."</font></td>
					<td><div class='eliminar'><font size=$tam><a href='".$usuarios[$i][11]."' target=blank>
							URL</a></font></div></td>
					<td><font size=$tam>".$usuarios[$i][12]."</font></td>
					<td><font size=$tam>".$usuarios[$i][13]."</font></td>
					<td><font size=$tam>".$usuarios[$i][14]."</font></td>
					<td><font size=$tam>".$usuarios[$i][15]."</font></td>
				</tr>";
 			
 		}

		echo "</table>";
 		
 	
 		
 	}

	echo "</table></div>";	
?>