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


echo"<div class='row well'>";
switch ($numero_error){ 
 default:
  //todo lo de Modificar el usuario
  $_perfi = $c_categoria2->get_Id();
  /*if($c_perfil->get_PermisoSistema()){
    echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
  }else*/ echo"<form action='../script/Editar_Categoria.php?doc=".$c_categoria2->get_Id()."&perfi=".$_perfi."' method='post'>";

    echo "<div  >
                <table class='table table-striped table-hover '>
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
                         echo "<input type='text' name='nombre' class='form-control' value='".$c_categoria2->get_Nombre()."' placeholder='Nombre' required='required' maxlength=30 />";
                            echo "
                        </td>
                    </tr>
                    
                    <tr>
                        <td>
                           Descripcion:
                        </td>
                        <td>
                          <input type='text' name='descripcion' class='form-control' value='".$c_categoria2->get_Descripcion()."' placeholder='Descripcion' required='required' maxlength=500/>
                        </td>  
                    </tr>                

                </table>
            <input type='submit' name='crear' class='btn btn-primary' value='Actualizar Categoria'>
            <input type='reset' name='borrar' class='btn btn-primary' value='Restaurar Campos'>
            <button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>
            </div><br><br>";



    echo"</fomr>";

break;
case "error1":
  echo "<h1><i>Se ha modificado la Categoria.</i></h1>";
  echo "<a href='/mibarrio/pages/Visualizar_Categorias.php?page=1' class='btn btn-primary'>Ok</a>";
break; 
case "error2":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 13 caracteres</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error3":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 2 caracteres y maximo 30 caracteres</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error4":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error5":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Id' debe ser numerico</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error6":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Nombre' debe ser alfanumerico</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error7":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Descripcion' debe ser alfanumerico</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
case "error8":
    echo "<div class='login-help'><h1><i>No se ha modificado la Categoria.</i></h1>";
    echo "<p>Error: 'Ya existe una categoria con el mismo Nombre</div><br>";
    echo "<button type='button' class='btn btn-primary' onclick='history.back()'>Atras</button>";
break;
}
?>
</div>
        </div>
        <script src="../js/jquery.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>
    </body>
</html>