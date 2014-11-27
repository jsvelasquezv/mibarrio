<?php

	include ("perfil.php"); 

	echo"<div class='row'>";


	$recibe_pagina=$_REQUEST['page'];
	$recibe = $recibe_pagina - 1;
	$recibe2 = $recibe_pagina;
	$recibe_pagina2=$recibe_pagina;
	$tam = 2;
	echo "<div class='well'>";
	 	if($c_perfil->get_PermisoSistema()){
 		echo"<div class='row'>
 		<form action='Buscar.php?page=1' method='post' class='form-inline'>
 				<div class='col-lg-2'>
 					<input type='text' name='nombre' value='' placeholder='Escriba el nombre a buscar' required='required' class='form-control'/>
 				</div>
 				<div class='col-lg-2'>
 					<input type='submit' name='buscar' class='btn btn-primary' value='Buscar' />
 				</div>
 			</form>
 		</div>
 		";
	echo "
<div class='row table-responsive'>
	<table  class='table table-striped table-bordered table-hover table-condensed'>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Documento</font></td>
			<td><font size=$tam>Tipo Id</font></td>
			<td><font size=$tam>Nombres</font></td>
			<td><font size=$tam>Apellidos</font></td>
			<td><font size=$tam>Usuario</font></td>
			<!--<td><font size=$tam>Contrase&ntilde;a</font></td>
			<td><font size=$tam>Pregunta</font></td>
			<td><font size=$tam>Respuesta</font></td>-->
			<td><font size=$tam>Ciudad</font></td>
			<td><font size=$tam>Direcci&oacute;n</font></td>
			<td><font size=$tam>Edad</font></td>
			<td><font size=$tam>Foto</font></td>
			<td><font size=$tam>Tel&eacute;fono</font></td>
			<td><font size=$tam>Correo Electr&oacute;nico</font></td>
			<td><font size=$tam>G&eacute;nero</font></td>
			<td><font size=$tam>Perfil</font></td>
		</tr> 
	";
 		$usuarios = $m_usuario->mostrar_Todos();
 		$tam_usuarios = count($usuarios);
 		$tam_usuarios2 = 0;
 		$saltos = 8; // Numero de usuarios que se muestran por pagina (solo para perfiles con permisos de Sistema)
 		$recibe *= $saltos;
 		$fin = $recibe + $saltos;
 		$recibe2 *= $saltos;
 		$fin2 = $recibe2 - $saltos;
 		for($i = $recibe; $i < $fin && $i < $tam_usuarios; $i++){
 			$c_perfil2 = new Controlador_Perfil();
 			$m_perfil2 = new Modelo_Perfil($c_perfil2);
 			$m_perfil2->buscar_Perfil2($usuarios[$i][15]);
			echo "
				<tr>
					<td><div class='eliminar'><font size=1><center>
						<a href='Visualizar_Usuario.php?gestion=".$usuarios[$i][0]."'>
						Editar<br></a>
						<a href='Eliminar_Usuario.php?gestion=".$usuarios[$i][0]."'>
						Eliminar</a></center></font></div></td>
					<td><font size=$tam>".$usuarios[$i][0]."</font></td>
					<td><font size=$tam>".$usuarios[$i][7]."</font></td>
					<td><font size=$tam>".$usuarios[$i][1]."</font></td>
					<td><font size=$tam>".$usuarios[$i][2]."</font></td>
					<td><font size=$tam>".$usuarios[$i][3]."</font></td>
					<!--<td><font size=$tam>".$usuarios[$i][4]."</font></td>
					<td><font size=$tam>".$usuarios[$i][5]."</font></td>
					<td><font size=$tam>".$usuarios[$i][6]."</font></td>-->
					<td><font size=$tam>".$usuarios[$i][8]."</font></td>
					<td><font size=$tam>".$usuarios[$i][9]."</font></td>
					<td><font size=$tam>".$usuarios[$i][10]."</font></td>
					<td><div class='eliminar'><font size=$tam><a href='".$usuarios[$i][11]."' target=blank>
							URL</a></font></div></td>
					<td><font size=$tam>".$usuarios[$i][12]."</font></td>
					<td><font size=$tam>".$usuarios[$i][13]."</font></td>
					<td><font size=$tam>".$usuarios[$i][14]."</font></td>
					<td><font size=$tam>".$c_perfil2->get_Nombre()."</font></td>
				</tr>";
 			
 		}
 		echo '</table>';
 		if($fin2 != 0){
 			$recibe_pagina2--;
 			echo '
 					<div >
 					<a class="btn btn-primary" href = "Ver_Usuario.php?page='.$recibe_pagina2.'">
 						Anterior
					</a></div>
 			';
 		}
 		
 		if($fin < $tam_usuarios){
 			$recibe_pagina++;
 			echo '
 					<div >
 					 <a class="btn btn-primary" href = "Ver_Usuario.php?page='.$recibe_pagina.'">
 						Siguiente
					</a></div>
 			';
 		}
 		echo '</tr>';

		echo "";
 		
 	
 		
 	}else{
 		// Parte para el perfil sin permisos de ver a otros usuarios
		echo "
			<tr>
				<td><div class='eliminar'><font size=1>
					<a href='Visualizar_Usuario.php?gestion=".$c_usuario->get_Nid()."'>
					Editar</a></font></div></td>
				<td><font size=$tam>".$c_usuario->get_Nid()."</font></td>
				<td><font size=$tam>".$c_usuario->get_TipoId()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Nombres()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Apellidos()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Usuario()."</font></td>
				<!--<td><font size=$tam>".$c_usuario->get_Password()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Pregunta()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Respuesta()."</font></td>-->
				<td><font size=$tam>".$c_usuario->get_Ciudad()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Direccion()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Edad()."</font></td>
					<td><div class='eliminar'><font size=$tam><a href='".$c_usuario->get_Foto()."' target=blank>
							URL</a></font></div></td>
				<td><font size=$tam>".$c_usuario->get_Celular()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Email()."</font></td>
				<td><font size=$tam>".$c_usuario->get_Genero()."</font></td>
				<td><font size=$tam>".$c_perfil->get_Nombre()."</font></td>
			</tr>
		
		";
 	
 	}

	echo "</div></div>";	
?>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/npm.js"></script>
	</body>
</html>
