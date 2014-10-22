<?php

	include ("perfil.php"); 

	$numero_error=$_REQUEST['gestion'];


	echo"<div class='contenido'>";
switch ($numero_error){ 
 default:
 	//todo lo de Modificar el usuario
 	$_perfi = $c_usuario->get_Perfil();
 	 echo"<form action='../script/Crear_Categoria.php' method='post'>";

		echo "<div class='CSSTableGenerator' >
                <table >
                	<tr>
                        <td colspan='2'>
                            Crear Categoria
                        </td>
                     <tr> 

                      <tr>
                        <td>
                            Id:
                        </td>
                        <td>
                            <input type='text' name='id'  placeholder='Id' required='required' maxlength=30/>
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
					  <td  TD BGCOLOR='#FFFFFF'>

					  <input type='submit' name='crear' class='login login-submit' value='Crear Categoria'>

					  </td>

					  
					</tr>
                </table>
            </div><br><br>";



		echo"</fomr>";


break;
case 1:
	echo "<h1><i>Se ha creado la Categoria.</i></h1>";
break; 
case 2:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 13 caracteres</div><br>";
break;
case 3:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 2 caracteres y maximo 30 caracteres</div><br>";
break;
case 4:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
break;
case 5:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Id' debe ser numerico</div><br>";
break;
case 6:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Nombre' debe ser alfanumerico</div><br>";
break;
case 7:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Descripcion' debe ser alfanumerico</div><br>";
break;
case 8:
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Ya existe una categoria con el mismo Id o el mismo Nombre</div><br>";
break;
}
?>
</div>