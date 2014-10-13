<?php
	//incluye el menu y demas cosas contenidas en perfil.php
	include ("perfil.php"); 
	//inicio de la div de contenido, cajon central
echo"<div class='contenido'>";
//segun sea el caso en el header indica la acciona realizar
$recibe_pagina=$_REQUEST['gestion'];

switch ($recibe_pagina){ 
	// en el caso de que gestion=crearPerfil
 case "crearPerfil":
 	//todo lo de crear perfil
 	//verifica los permisos de quien se logueo
 	if($c_perfil->get_PermisoPerfiles()){
 		//imprime el form y indica a donde mandara los campos
 		echo"<form action='../script/Crear_Perfil.php' method='post'>";

 		//div con scroll, que contendra la tabla con las opciones.
 		// el primer input contendra el campo para el nombre del nuevo perfil
		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>
                        <td colspan='2'>
                            Datos del nuevo perfil:
                        </td>
                     <tr> 

                    <tr>
                        <td>
                            Nombre del perfil:
                        </td>
                        <td >
                            <input type='text' name='nomb_Perfil' value='' placeholder='Escriba el nombre del perfil' required='required' maxlength=50/>
                        </td>
                     <tr>   
                </table>
            </div><br><br>";

         // se imprime otra tabla que contendra los radio (casillas de opcion) al ser seleccionadas y dar sumit, envian el value.
         //los radio que tengan el mismo "name" solo pueden seleccionarese una opcion.   
		echo "<div class='CSSTableGenerator'><table>
					<tr>
					  <td><strong>Permiso</strong></td>
					  <td><strong>S&iacute;</strong></td>
					  <td><strong>No</strong></td>
					</tr>
					 
					<tr>
					  <td>Sistema</td>
					  <td><input type='radio' name='sis' value='1' /></td>
					  <td><input type='radio' name='sis' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Perfiles</td>
					  <td><input type='radio' name='perf' value='1' /></td>
					  <td><input type='radio' name='perf' value='0' checked='checked' /></td>
					</tr>
					 
					<tr>
					  <td>Productos</td>
					  <td><input type='radio' name='prod' value='1' /></td>
					  <td><input type='radio' name='prod' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Inventario</td>
					  <td><input type='radio' name='inv' value='1' /></td>
					  <td><input type='radio' name='inv' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Facturacion</td>
					  <td><input type='radio' name='fac' value='1' /></td>
					  <td><input type='radio' name='fac' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  <td>Reportes</td>
					  <td><input type='radio' name='rep' value='1' /></td>
					  <td><input type='radio' name='rep' value='0' checked='checked' /></td>
					</tr>

					<tr>
					  
					  <td colspan='3'><br></td>
					</tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  <input type='submit' name='crear' class='login login-submit' value='Crear Perfil'>

					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>

					  <input type='reset' name='borrar' class='login login-submit' value='Borrar Campos'>

					  </td>
					</tr>

			</table></div>";

		echo"</fomr>";

 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
		//en caso no haber tenido permiso y haber ingresado a la url, imprime el error

break;
	// en caso de que gestion=exito, devuelto por el controlador, imprime exito
case "exito":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>Se ha creado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break; 
	// aqui van los errores devueltos a la hora de crear el perfil
case "error":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha creado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;
case "exito2":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>Se ha borrado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break; 
case "error2":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha borrado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break; 
	// en caso de haber modificado el perfil y tener exito
case "exito3":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>Se ha modificado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break; 
	// errores a la hora de crear el perfil devuelven esto
case "error3":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha modificado el perfil.</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;  
case "error4":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha creado el perfil, El nombre del perfil debe tener minimo 2 Caracteres</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;
case "error5":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha creado el perfil, No deben haber perfiles sin almenos un permiso</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;
case "error6":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha modificado el perfil, El nombre del perfil debe tener minimo 2 Caracteres</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;
case "error7":
 	if($c_perfil->get_PermisoPerfiles()){
		echo "<h1><i>No se ha modificado el perfil, No deben haber perfiles sin almenos un permiso</i></h1>";
 	}else
		echo "<h1><i>Esto no te pertenece.</i></h1>";
break;

case "visualizar":
  		
		//include_once '../controladores-php/selecionar.php';

		// en el caso de que gestion= visualizar muestra los nombres de todos los perfiles almacenados, en un "select"
		// o combobox

		// m_perfil ya ha sido creado en perfil.php, se llama al metodo que muestra todos los perfiles 	
		$data=$m_perfil->mostrar_Todos();
		
			
		//inicio del form con una tabla pequeña que contendra el combo y el submit para enviar el nombre a esta misma pagina 
		// con otro header en gestion
		echo"<form action='Crear_Perfil.php?gestion=visualizar-seleccion' method='post'>

		<div class='CSSTableGenerator'><table>

		<tr>
		<td colspan='2'>
                     Selecciona un perfil:
        </td>
		</tr>

		<tr>
		<td>
			<select name='Nombre_perfil' class='select'>";
				       
		for($i=0; $i<count($data); $i++)
		{
			echo "<option value='"; 
			echo "".$data[$i][0]."'>";
			echo "".$data[$i][0]."</option>";	
		}
		
		echo"</select>
		</td>";	

		echo"<td>
		<input type='submit' name='visualizar' class='login login-submit' value='Visualizar'>
		</td>";
		echo"<tr>";

break; 
case "visualizar-seleccion":
		// despues de haber seleccionado el perfil se recarga la pagina con gestion=visualizar-seleccion

		// instnacias de las clases necesarias para visualizar el perfil seleccionado, realiza la busqueda 
		// en base al nombre.
		$consulta_perfil = new Controlador_Perfil();
		$mConsulta_perfil = new Modelo_Perfil($consulta_perfil);
		$mConsulta_perfil->buscar_Perfil($_REQUEST['Nombre_perfil']);
		$mConsulta_perfil->desconectarBD();

		$namePE = $consulta_perfil->get_Nombre();

		// imprime una tabla con la informacion del perfil (permisos "booleanos", y nombre "string")
		// en caso de que un permiso sea true, imprime "si", caso contrario "no".
		echo "

		<div class='CSSTableGenerator'><table>
					<tr>
					  <td ><strong>Perfil: ".$namePE."</strong></td>
					 
					</tr></table></div><br><br><br>";


		echo "<div class='CSSTableGenerator'><table>
					<tr>
					   <td colspan='3'><strong>Permiso</strong></td>
					  
					 
					</tr>
					 
					<tr>
					  <td>Sistema</td>";

					  if($consulta_perfil->get_PermisoSistema()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";		

					echo"
					</tr>
					 
					<tr>
					  <td>Perfiles</td>";

					  if($consulta_perfil->get_PermisoPerfiles()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					echo"
					</tr>
					 
					<tr>
					  <td>Productos</td>";
					  if($consulta_perfil->get_PermisoProductos()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";
	
					  
					echo"  
					</tr>

					<tr>
					  <td>Inventario</td>";
					  if($consulta_perfil->get_PermisoInventario()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					 echo" 
					</tr>

					<tr>
					  <td>Facturacion</td>";
					  if($consulta_perfil->get_PermisoFacturacion()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";

					 echo"
					</tr>

					<tr>
					  <td>Reportes</td>";
					  if($consulta_perfil->get_PermisoReportes()){
							echo "<td><strong>Si</strong></td>";	
						}
						else echo "<td><strong>No</strong></td>";
						
					 echo"
					</tr>

					<tr>					  
					  <td colspan='2'></td>
					</tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  	 <a href='Modificar_Perfil.php?id=".$namePE."'><div class='links2 links2-submit'>
						 <b>Modificar perfil</b></div></a>
					  
					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>
					  	<a href='Eliminar_Perfil.php?id=".$namePE."'><div class='links2 links2-submit'>
						<b>Eliminar perfil</b></div></a>

					  </td>
					</tr>

			</table></div>";
break;		
default:
// en caso no presentarse ninguna de las opciones anteriores imprime esto
echo "<h1><b>Bienvenido, ".$c_usuario->get_Nombres().".</b></h1>";
}


?>
</div>



</body>
</html>
