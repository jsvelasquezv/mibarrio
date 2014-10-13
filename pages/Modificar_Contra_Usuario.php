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
 		echo" <form action='../script/Modificar_Contra_Usuario.php?id=".$idUS."' method='post'>";
		echo "

		<div class='CSSTableGenerator'><table>
					<tr>
					  <td colspan = 2><strong>Usuario: ".$nameUS."</strong></td>
					 
					</tr>";



					 echo "

                    <tr>
                        <td>
                            Nueva Contrase&ntilde;a:
                        </td>
                        <td>
                          <input type='password' name='pass' value='' placeholder='Contrase&ntilde;a' required='required' maxlength=8/>
                        </td>  
                    </tr>

					<tr>
					  <td  TD BGCOLOR='#FFFFFF' colspan=2>

					  	 <input type='submit' name='passwordaccept' class='login login-submit' value='Confirmar'>
					  
					  </td>
					</tr>

			</table></div>";
 		echo "</form>";
?>