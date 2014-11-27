<?php
	// llamado dl archivo que contiene los menus entre otras cosas.
	include ("perfil.php"); 
	
	echo"<div class='row '><div class='col-lg-3'></div>
			<div class='well  col-lg-6'>";
	//se asigna a una variable el id contenido en el header
	$nombre = $_REQUEST['id'];
	$c_perfil2 = clone $c_perfil;
	$m_perfil2 = new Modelo_Perfil($c_perfil2);
	// se busca el perfil seleccionado
	$m_perfil2->buscar_Perfil($nombre);

	// se verifican los permisos del usuario.
if($c_perfil->get_PermisoPerfiles()){
		// se imprime el form y la tabla que contendra los valores modificables del perfil que se selecciono
 		echo"<form action='../script/Modificar_Perfil.php?perfil=".$nombre."' method='post' class='form-horizontal'>";


		echo "  <table class='table table-striped table-hover'>
                	<tr>

                        <td colspan='2'>
                            Ingrese nuevos datos para el perfil: ".$nombre."
                        </td>
                     <tr> 
                     
                      <tr>
                        <td>
                            Nombre del perfil:
                        </td>
                        <td > 
                        	<input type='text' name='newnomb' value='".$nombre."' required='required' maxlength=50/>
                        </td>
                     </tr>	
                </table><br>";

            // al dar submit envia los valores (1,0) de los "radio" los que tienen el mismo "name" solo se puede seleccionar una opcion
		echo "<div class='CSSTableGenerator'><table class='table table-striped table-hover'>
					<tr>
					  <td><strong>Permiso</strong></td>
					  <td><strong>S&iacute;</strong></td>
					  <td><strong>No</strong></td>
					</tr>
					 
					<tr>
					  <td>Sistema</td>";
					  if($c_perfil2->get_PermisoSistema()){
						  echo "
						  <td><input type='radio' name='newsis' value='1' checked='checked'/></td>
						  <td><input type='radio' name='newsis' value='0'/></td>";
					  }else {
						  echo "
						  <td><input type='radio' name='newsis' value='1' /></td>
						  <td><input type='radio' name='newsis' value='0' checked='checked' /></td>";
					  }
					  echo "
					</tr>
					 
					<tr>
					  <td>Perfiles</td>";
					if($c_perfil2->get_PermisoPerfiles()){
						echo "
						<td><input type='radio' name='newperf' value='1' checked='checked'/></td>
						<td><input type='radio' name='newperf' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newperf' value='1' /></td>
						<td><input type='radio' name='newperf' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>
					 
					<tr>
					  <td>Productos</td>";
					if($c_perfil2->get_PermisoProductos()){
						echo "
						<td><input type='radio' name='newprod' value='1' checked='checked'/></td>
						<td><input type='radio' name='newprod' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newprod' value='1' /></td>
						<td><input type='radio' name='newprod' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Inventario</td>";
					if($c_perfil2->get_PermisoInventario()){
						echo "
						<td><input type='radio' name='newinv' value='1' checked='checked'/></td>
						<td><input type='radio' name='newinv' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newinv' value='1' /></td>
						<td><input type='radio' name='newinv' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Facturaci&oacute;n</td>";
					if($c_perfil2->get_PermisoFacturacion()){
						echo "
						<td><input type='radio' name='newfac' value='1' checked='checked'/></td>
						<td><input type='radio' name='newfac' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newfac' value='1' /></td>
						<td><input type='radio' name='newfac' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>
					<tr>

					  <td>Clientes</td>";
					if($c_perfil2->get_PermisoCliente()){
						echo "
						<td><input type='radio' name='newcli' value='1' checked='checked'/></td>
						<td><input type='radio' name='newcli' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newcli' value='1' /></td>
						<td><input type='radio' name='newcli' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Venta</td>";
					if($c_perfil2->get_PermisoVenta()){
						echo "
						<td><input type='radio' name='newve' value='1' checked='checked'/></td>
						<td><input type='radio' name='newve' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newve' value='1' /></td>
						<td><input type='radio' name='newve' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>

					<tr>
					  <td>Reportes</td>";
					if($c_perfil2->get_PermisoReportes()){
						echo "
						<td><input type='radio' name='newrep' value='1' checked='checked'/></td>
						<td><input type='radio' name='newrep' value='0'/></td>";
					}else{
						echo "
						<td><input type='radio' name='newrep' value='1' /></td>
						<td><input type='radio' name='newrep' value='0' checked='checked' /></td>";
					}
					echo "
					</tr>







					</table>
					 <input type='submit' name='actualizar' class='btn btn-primary col-lg-offset-3' value='Modificar Perfil'>
					 <input type='reset' name='borrarCampos' class='btn btn-primary col-lg-offset-1' value='Borrar Campos'>
			</div>";

		echo"</fomr>";
	 		
	 	}else
	 		//en caso de que el permiso no sea correcto
			echo "<h1><i>Esto no te pertenece.</i></h1>";

	echo "</div></div>";	
?>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>
    </body>
</html>