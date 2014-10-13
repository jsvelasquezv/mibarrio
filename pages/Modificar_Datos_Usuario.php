<?php

  include ("perfil.php"); 

  $numero_error=$_REQUEST['gestion'];
  if($c_perfil->get_PermisoSistema())
    $m_usuario->buscar_Usuario2($numero_error);
  //else $documento = $c_usuario->get_Nid();


echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
  //todo lo de Modificar el usuario
  $_perfi = $c_usuario->get_Perfil();
  /*if($c_perfil->get_PermisoSistema()){
    echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
  }else*/ echo"<form action='../script/Modificar_Usuario.php?doc=".$c_usuario->get_Nid()."&perfi=".$_perfi."' method='post'>";

    echo "<div class='CSSTableGenerator' >
                <table >
                  <tr>
                        <td colspan='2'>
                            Modificar Usuario
                        </td>
                     <tr> 

                    <tr>
                        <td>
                            Documento:
                        </td>
                        <td >";
                         echo "<input type='text' name='n_id' value='".$c_usuario->get_Nid()."' placeholder='Documento' required='required' maxlength=15 />";
                            echo "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombres:
                        </td>
                        <td>
                          <input type='text' name='nom' value='".$c_usuario->get_Nombres()."' placeholder='Nombres' required='required' maxlength=30/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Apellidos:
                        </td>
                        <td>
                          <input type='text' name='apell' value='".$c_usuario->get_Apellidos()."' placeholder='Apellidos' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Usuario:
                        </td>
                        <td>
                          <input type='text' name='usu' value='".$c_usuario->get_Usuario()."' placeholder='Usuario' required='required' maxlength=8/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                          <input type='password' name='pass' value='".$c_usuario->get_Password()."' placeholder='Password' required='required' maxlength=8/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Pregunta:
                        </td>
                        <td>
                          <input type='text' name='pregun' value='".$c_usuario->get_Pregunta()."' placeholder='Pregunta' required='required' maxlength=150/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Respuesta:
                        </td>
                        <td>
                          <input type='text' name='respues' value='".$c_usuario->get_Respuesta()."' placeholder='Respuesta' required='required' maxlength=150/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Tipo Documento:
                        </td>
                        <td>
                          <input type='text' name='tipo_id' value='".$c_usuario->get_TipoId()."' placeholder='Tipo Documento' required='required' maxlength=5/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Ciudad:
                        </td>
                        <td>
                          <input type='text' name='ciud' value='".$c_usuario->get_Ciudad()."' placeholder='Ciudad' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Direcci&oacute;n:
                        </td>
                        <td>
                          <input type='text' name='dire' value='".$c_usuario->get_Direccion()."' placeholder='Direcci&oacute;n' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Edad:
                        </td>
                        <td>
                          <input type='text' name='_edad' value='".$c_usuario->get_Edad()."' placeholder='Edad' required='required' maxlength=3/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Foto:
                        </td>
                        <td>
                          <input type='text' name='fot' value='".$c_usuario->get_Foto()."' placeholder='Foto' required='required' maxlength=400/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Tel&eacute;fono:
                        </td>
                        <td>
                          <input type='text' name='celu' value='".$c_usuario->get_Celular()."' placeholder='Tel&eacute;fono' required='required' maxlength=10/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Correo Electr&oacute;nico:
                        </td>
                        <td>
                          <input type='text' name='e_mail' value='".$c_usuario->get_Email()."' placeholder='Correo Electr&oacute;nico' required='required' maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            G&eacute;nero:
                        </td>
                        <td>
                          <input type='text' name='gene' value='".$c_usuario->get_Genero()."' placeholder='G&eacute;nero' required='required' maxlength=1/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Perfil (Actual: "; echo $c_usuario->get_Perfil()."):
                        </td>";
                        //Aqui el algoritmo para hacer un combobox para los perfiles
                        $arr_perfiles = $m_perfil->mostrar_Todos();
                        $tam_perfiles = count($arr_perfiles);
                        $combobit = "";
                        for($i = 0; $i < $tam_perfiles; $i++){
                          if($c_usuario->get_Perfil() === $arr_perfiles[$i][0]){
                            $_perfi = $arr_perfiles[$i][0];
                            $combobit .=" <option value='".$arr_perfiles[$i][0]."' selected>".$arr_perfiles[$i][0]."</option>";
                          }
                          else $combobit .=" <option value='".$arr_perfiles[$i][0]."'>".$arr_perfiles[$i][0]."</option>";
                        }
                        if($c_perfil->get_PermisoSistema())
                          echo "<td><select name='perfi' class='select'>".$combobit."</select></td>";
                        else echo "<td><select name='perfi' disabled>".$combobit."</select></td>";
                        echo "
                    </tr>
          <tr>
            <td  TD BGCOLOR='#FFFFFF'>

            <input type='submit' name='crear' class='login login-submit' value='Actualizar Usuario'>

            </td>

            <td colspan='2' TD BGCOLOR='#FFFFFF'>

            <input type='reset' name='borrar' class='login login-submit' value='Restaurar Campos'>

            </td>
          </tr>
                </table>
            </div><br><br>";



    echo"</fomr>";


break;
case 1:
  echo "<h1><i>Se ha modificado el usuario.</i></h1>";
break; 
case 2:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Documento' m&iacute;nimo: 8</div><br>";
break;
case 3:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombres' m&iacute;nimo: 2 letras</div><br>";
break;
case 4:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Apellidos' m&iacute;nimo: 2 letras</div><br>";
break;
case 5:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Usuario' m&iacute;nimo: 5 caracteres</div><br>";
break;
case 6:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Password' m&iacute;nimo: 5 caracteres</div><br>";
break;
case 7:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Pregunta' m&iacute;nimo: 10 caracteres</div><br>";
break;
case 8:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Respuesta' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 9:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Tipo Documento' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 10:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Ciudad' m&iacute;nimo: 2 caracteres</div><br>";
break;
case 11:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Direcci&oacute;n' m&iacute;nimo: 3 caracteres</div><br>";
break;
case 12:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Edad' m&iacute;nimo: 1 caracter</div><br>";
break;
case 13:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Foto' m&iacute;nimo: 3 caracteres</div><br>";
break;
case 14:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Tel&eacute;fono' m&iacute;nimo: 8 caracteres</div><br>";
break;
case 15:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Correo Electr&oacute;nico' m&iacute;nimo: 6 caracteres</div><br>";
break;
case 16:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'G&eacute;nero' m&iacute;nimo: 1 caracter</div><br>";
break;
case 17:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Perfil' m&iacute;nimo: 1 caracter</div><br>";
break;
case 18:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Documento' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 19:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Usuario' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 20:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Nombres' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 21:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Apellidos' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 22:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Contrase&ntilde;a' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 23:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Pregunta' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 24:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Respuesta' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 25:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Ciudad' tipo de dato debe ser Alfab&eacute;tico</div><br>";
break;
case 26:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Edad' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 27:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Foto' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 28:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Tel&eacute;fono' tipo de dato debe ser Num&eacute;rico</div><br>";
break;
case 29:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Correo Electr&oacute;nico' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
case 30:
    echo "<div class='login-help'><h1><i>No se ha modificado el usuario.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Direcci&oacute;n' tipo de dato debe ser Alfanum&eacute;rico</div><br>";
break;
}


?>
</div>