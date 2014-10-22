<?php

  include ("perfil.php"); 
  include_once '../controladores/Controlador_Categoria.php';
  include_once '../modelos/Modelo_Categoria.php';

    $numero_error=$_REQUEST['gestion'];
    //Esto es para diferenciar el perfil del usuario que modifica, al usuario que están modificando

    $c_categoria = new Controlador_Categoria();
    $c_categoria2 = clone $c_categoria;
    $m_categoria2 = new Modelo_Categoria($c_categoria2);
    $c_perfil2 = clone $c_perfil;
    $m_perfil2 = new Modelo_Perfil($c_perfil2);
//    $m_categoria2->buscar_Usuario2($numero_error);

    if($c_perfil->get_PermisoSistema()){
        $m_categoria2->buscar_Categoria2($numero_error);
       // $m_perfil2->buscar_Perfil2($c_categoria2->get_Perfil());
    }
  //else $documento = $c_categoria->get_Nid();


echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
  //todo lo de Modificar el usuario
  $_perfi = $c_categoria2->get_Id();
  /*if($c_perfil->get_PermisoSistema()){
    echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
  }else*/ echo"<form action='../script/Editar_Categoria.php?doc=".$c_categoria2->get_Id()."&perfi=".$_perfi."' method='post'>";

    echo "<div class='CSSTableGenerator' >
                <table >
                  <tr>
                        <td colspan='2'>
                            Modificar Categoria
                        </td>
                     <tr> 
                     
                    <tr>
                        <td>
                            Nombre:
                        </td>
                        <td >";
                         echo "<input type='text' name='nombre' value='".$c_categoria2->get_Nombre()."' placeholder='Nombre' required='required' maxlength=30 />";
                            echo "
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                           Descripcion:
                        </td>
                        <td>
                          <input type='text' name='descripcion' value='".$c_categoria2->get_Descripcion()."' placeholder='Descripcion' required='required' maxlength=500/>
                        </td>  
                    </tr>                
          <tr>
            <td  TD BGCOLOR='#FFFFFF'>

            <input type='submit' name='crear' class='login login-submit' value='Actualizar Categoria'>

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
  echo "<h1><i>Se ha modificado la Categoria.</i></h1>";
break; 
case 2:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 13 caracteres</div><br>";
break;
case 3:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 2 caracteres y maximo 30 caracteres</div><br>";
break;
case 4:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
break;
case 5:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Id' debe ser numerico</div><br>";
break;
case 6:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Nombre' debe ser alfanumerico</div><br>";
break;
case 7:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Descripcion' debe ser alfanumerico</div><br>";
break;
case 8:
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Ya existe una categoria con el mismo Nombre</div><br>";
break;
}
?>
</div>