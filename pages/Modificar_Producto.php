<?php

  include ("perfil.php"); 
  include_once '../controladores/Controlador_Categoria.php';
    include_once '../modelos/Modelo_Categoria.php';
     include_once '../controladores/Controlador_Producto.php';
     include_once '../modelos/Modelo_Producto.php';

    $numero_error=$_REQUEST['gestion'];
    //Esto es para diferenciar el perfil del usuario que modifica, al usuario que están modificando
    $c_producto = new Controlador_Producto();
    $m_producto = new Modelo_Producto($c_producto);

    if($c_perfil->get_PermisoInventario()){
        $m_producto->buscar_Producto($numero_error);
    }
echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
  //todo lo de Modificar el usuario
  //$_perfi = $c_producto->get_Perfil();
  /*if($c_perfil->get_PermisoSistema()){
    echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
  }else*/ echo"<form action='../script/Editar_Producto.php?id=".$c_producto->get_Id()."' method='post'>";

    echo "<div class='CSSTableGenerator' >
                <table >
                  <tr>
                        <td colspan='2'>
                            Modificar Producto
                        </td>
                     <tr> 
                    
                    <tr>
                        <td>
                           Iva:
                        </td>
                        <td>
                            <select name='iva' class='select'>";
                        // Aqui el algoritmo para hacer un combobox para el genero
                        if($c_producto->get_Iva() == "SI"){
                            echo "
                                <option value='SI' selected>SI</option>
                                <option value='NO'>NO</option>                              
                            </select>";
                        }elseif($c_producto->get_Iva() == "NO") {
                            echo "
                                <option value='SI'>SI</option>
                                <option value='NO' selected>NO</option>                             
                            </select>";
                        }
                        echo "
                        </td>
                    </tr>
                    <tr>
                        <td>
                           Estado:
                        </td>
                        <td>
                            <select name='estado' class='select'>";
                        // Aqui el algoritmo para hacer un combobox para el genero
                        if($c_producto->get_Estado() == "Disponible"){
                            echo "
                                <option value='Disponible' selected>Disponible</option>
                                <option value='No_Disponible'>No Disponible</option>                              
                            </select>";
                        }elseif($c_producto->get_Estado() == "No_Disponible") {
                            echo "
                                <option value='No_Disponible'selected>No Disponible</option>
                                <option value='Disponible'>Disponible</option>                             
                            </select>";
                        }
                        echo "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Descripcion:
                        </td>
                        <td>
                          <input type='text' name='descripcion' value='".$c_producto->get_Descripcion()."' placeholder='Descripcion' required='required' maxlength=500/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Precio de Compra:
                        </td>
                        <td>
                          <input type='text' name='precioCompra' value='".$c_producto->get_Precio_Compra()."' placeholder='Precio de Compra' required='required' maxlength=10/>
                        </td>  
                    </tr>
                     <tr>
                        <td>
                            Precio de Venta:
                        </td>
                        <td>
                          <input type='text' name='precioVenta' value='".$c_producto->get_Precio_Venta()."' placeholder='Precio de Venta' required='required' maxlength=10/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Nombre:
                        </td>
                        <td>
                          <input type='text' name='nombre' value='".$c_producto->get_Nombre()."' placeholder='Nombre' required='required' maxlength=30/>
                        </td>  
                    </tr>
                     <tr>
                        <td>
                            Categoria:
                        </td>
                        <td>
                          <input type='text' name='categoria' value='".$c_producto->get_Categoria()."' placeholder='Nombre' required='required' readonly maxlength=30/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Valor Iva:
                        </td>
                        <td>
                          <input type='text' name='valorIva' value='".$c_producto->get_Valor_Iva()."' placeholder='Valor Iva' required='required' maxlength=6/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Cantidad:
                        </td>
                        <td>
                          <input type='text' name='cantidad' value='".$c_producto->get_Cantidad()."' placeholder='Cantidad' required='required' maxlength=10/>
                        </td>  
                    </tr>
          <tr>
            <td  TD BGCOLOR='#FFFFFF'>

            <input type='submit' name='crear' class='login login-submit' value='Actualizar Producto'>

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
    echo "<h1><i>Se ha modificado el Producto.</i></h1>";
break; 
case 2:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 15 caracteres</div><br>";
break;
case 3:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 4 caracteres y maximo 30 caracteres</div><br>";
break;
case 4:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
break;
case 5:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Valor Iva' m&iacute;nimo: 3 caracteres y maximo 6 caracteres</div><br>";
break;
case 6:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Precio de Compra' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 7:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Precio de Venta' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 8:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Cantidad' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 9:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Id debe ser alfanumerico</div><br>";
break;
case 10:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Nombre debe ser alfabetico</div><br>";
break;
case 11:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error:Descripcion debe ser alfanumerico</div><br>";
break;
case 12:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Precio de Compra debe ser numerico</div><br>";
break;
case 13:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Precio de Venta debe ser numerico</div><br>";
break;
case 14:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Cantidad debe ser numerico</div><br>";
break;
case 15:
    echo "<div class='login-help'><h1><i>No se ha modificado el Producto.</i></h1>";
    echo "<p>Error: Ya existe un Producto con el mismo Id</div><br>";
}

?>
</div>