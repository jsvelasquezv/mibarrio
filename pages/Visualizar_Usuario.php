<?php

  include ("perfil.php"); 

  $numero_error=$_REQUEST['gestion'];
  $c_usuario2 = new Controlador_Usuario();
  $m_usuario2 = new Modelo_Usuario($c_usuario2);
echo"<div class='contenido'>";
  if($c_perfil->get_PermisoSistema()){

    $m_usuario2->buscar_Usuario2($numero_error);
    //echo 'SI tengo permisos root<br>';
  }else {
  	$c_usuario2 = $c_usuario;
    //echo 'NO tengo permisos root<br>';
  }


		$nameUS = $c_usuario2->get_Nombres();
		$idUS = $c_usuario2->get_Nid();
		echo "

		<div class='CSSTableGenerator'><table>
					<tr>
					  <td colspan = 2><strong>Usuario: ".$nameUS."</strong></td>
					 
					</tr>";



					 echo "


					<tr>
					  <td  TD BGCOLOR='#FFFFFF'>

					  	 <a href='Modificar_Usuario.php?gestion=".$idUS."'><div class='links2 links2-submit'>
						 <b>Modificar Datos</b></div></a>
					  
					  </td>

					  <td colspan='2' TD BGCOLOR='#FFFFFF'>
					  	<a href='Modificar_Contra_Usuario.php?gestion=".$idUS."'><div class='links2 links2-submit'>
						<b>Cambiar Contrase&ntilde;a</b></div></a>

					  </td>
					</tr>

			</table></div>";
?>