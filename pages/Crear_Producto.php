<?php

	include ("perfil.php"); 
    include_once '../controladores/Controlador_Categoria.php';
    include_once '../modelos/Modelo_Categoria.php';
    include_once '../controladores/Controlador_Producto.php';

	$numero_error=$_REQUEST['gestion'];

	echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
    $c_producto = new Controlador_Producto();
    $c_categoria = new Controlador_Categoria();
    $m_categoria = new Modelo_Categoria($c_categoria);
 	//todo lo de Modificar el usuario
    $_cate = $c_producto->get_Categoria();
    /*if($c_perfil->get_PermisoSistema()){
        echo"<form action='../controladores-php/Controlador_Modificar_Usuario.php?perfi=0' method='post'>";
    }else*/ 
                                

    echo"<form id='formulario' form action='../script/Crear_Producto.php' method='post'>";

        echo "<div class='CSSTableGenerator' >

                <table >
                    <tr>
                        <td colspan='2'>
                            Crear Producto
                        </td>
                     <tr> 

                    <tr>
                        <td>
                            Id:
                        </td>
                        <td >";
                         echo "<input type='text' name='id'  placeholder='Id' required='required' maxlength=15 />";
                            echo "
                        </td>
                    </tr>    
                    <tr>
                        <td>
                            Nombre:
                        </td>
                        <td>
                            <input type='text' name='nombre'  placeholder='Nombre' required='required' maxlength=30/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Descripcion:
                        </td>
                        <td>
                            <input type='text' name='descripcion'  placeholder='Descripcion' required='required' maxlength=500/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Categoria:
                        </td>";
                        //Aqui el algoritmo para hacer un combobox para los perfiles
                        $arr_categorias = $m_categoria->mostrar_Todos();
                        $tam_categorias = count($arr_categorias);
                        //echo $tam_categorias;
                        //echo $arr_categorias[2][1];
                        $combobit = "";
                        for($i = 0; $i < $tam_categorias; $i++){
                            if($c_producto->get_Categoria() === $arr_categorias[$i][1]){
                                $_cate = $arr_categorias[$i][1];
                                $combobit .=" <option value='".$arr_categorias[$i][1]."' selected>".$arr_categorias[$i][1]."</option>";
                            }
                            else $combobit .=" <option value='".$arr_categorias[$i][1]."'>".$arr_categorias[$i][1]."</option>";
                        }
                        if($c_perfil->get_PermisoInventario())
                            echo "<td><select name='categoria' class='select'>".$combobit."</select></td>";
                        else echo "<td><select name='categoria' class='select' disabled>".$combobit."</select></td>";
                        echo "
                    </tr>
                    <tr>
                        <td>
                            Iva:
                        </td>
                        <td>
                            <!-- Aqui el algoritmo para hacer un combobox para el iva -->
                             <select name='iva' class='select'>
                                <option value='SI' selected onclick='myFunction()''>SI</option>
                                <option value='NO' onclick='myFunction2()''>NO</option>
                            </select>
                        </td>      
                    </tr>
                    <tr>
                        <td>
                            Valor Iva:
                        </td>
                        <td>
                            <input type='text' name='valorIva' id='valorIva' placeholder='Iva' required='required' maxlength=6/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Precio de Compra:
                        </td>
                        <td>
                            <input type='text' name='precioCompra'  placeholder='Precio de Compra' required='required' maxlength=10/>
                        </td>  
                    </tr>
                     <tr>
                        <td>
                            Precio de venta:
                        </td>
                        <td>
                            <input type='text' name='precioVenta'  placeholder='Precio de venta' required='required' maxlength=10/>
                        </td>  
                    </tr>
                    <tr>
                        <td>
                            Cantidad:
                        </td>
                        <td>
                            <input type='text' name='cantidad'  placeholder='Cantidad' required='required' maxlength=10/>
                        </td>  
                    </tr>
                   
                    <tr>
                        <td>
                            Estado:
                        </td>
                        <td>
                            <!-- Aqui el algoritmo para hacer un combobox para el estado -->
                            <select name='estado' class='select'>
                                <option value='Disponible' selected>Disponible</option>
                                <option value='No_Disponible'>No Disponible</option>
                            </select>
                        </td>  
                    </tr>                    
                    <tr>
                      <td  TD BGCOLOR='#FFFFFF'>

                      <input type='submit' name='crear' class='login login-submit' value='Crear Producto'>

                      </td>

                      
                    </tr>
                </table>
            </div><br><br>
            <script>
                function myFunction() {
                document.getElementById('valorIva').disabled = false;
                }
                function myFunction2() {
                document.getElementById('valorIva').disabled = true;
                }
            </script>
            ";

        echo"</form>";


break;
case 1:
	echo "<h1><i>Se ha creado el Producto.</i></h1>";
break; 
case 2:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 15 caracteres</div><br>";
break;
case 3:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 4 caracteres y maximo 30 caracteres</div><br>";
break;
case 4:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
break;
case 5:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Valor Iva' m&iacute;nimo: 3 caracteres y maximo 6 caracteres</div><br>";
break;
case 6:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Precio de Compra' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 7:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Precio de Venta' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 8:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Cantidad' m&iacute;nimo: 2 caracteres y maximo 10 caracteres</div><br>";
break;
case 9:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Id debe ser alfanumerico</div><br>";
break;
case 10:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Nombre debe ser alfabetico</div><br>";
break;
case 11:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error:Descripcion debe ser alfanumerico</div><br>";
break;
case 12:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Precio de Compra debe ser numerico</div><br>";
break;
case 13:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Precio de Venta debe ser numerico</div><br>";
break;
case 14:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Cantidad debe ser numerico</div><br>";
break;
case 15:
    echo "<div class='login-help'><h1><i>No se ha creado el Producto.</i></h1>";
    echo "<p>Error: Ya existe un Producto con el mismo Id</div><br>";
break;
}
?>
</div>