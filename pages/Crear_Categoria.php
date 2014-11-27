<?php

	include ("perfil.php"); 

	$numero_error=$_REQUEST['gestion'];


	echo"<div class='row well'>";
switch ($numero_error){ 
 default:
 	//todo lo de Modificar el usuario
 	$_perfi = $c_usuario->get_Perfil();
 	 echo"<form action='../script/Crear_Categoria.php' method='post'>";

		echo "<div >
                <table class='table table-striped table-hover '>
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
                            <input type='text' name='id' class='form-control' placeholder='Id' required='required' maxlength=30/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nombre:
                        </td>
                        <td>
                        	<input type='text' name='nombre' class='form-control' placeholder='Nombre' required='required' maxlength=30/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Descripcion:
                        </td>
                        <td>
                        	<input type='text' name='descripcion' class='form-control' placeholder='Descripcion' required='required' maxlength=500/>
                        </td>  
                    </tr>                  
                </table>
					  <input type='submit' name='crear' class='btn btn-primary' value='Crear Categoria'>
            </div><br><br>";



		echo"</fomr>";


break;
case "error1":
	echo "<h1><i>Se ha creado la Categoria.</i></h1>";
break; 
case "error2":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Id' m&iacute;nimo: 5 caracteres y maximo 13 caracteres</div><br>";
break;
case "error3":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombre' m&iacute;nimo: 2 caracteres y maximo 30 caracteres</div><br>";
break;
case "error4":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Descripcion' m&iacute;nimo: 15 caracteres y maximo 500 caracteres</div><br>";
break;
case "error5":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Id' debe ser numerico</div><br>";
break;
case "error6":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Nombre' debe ser alfanumerico</div><br>";
break;
case "error7":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Descripcion' debe ser alfanumerico</div><br>";
break;
case "error8":
    echo "<div class='login-help'><h1><i>No se ha creado la Categoria.</i></h1>";
    echo "<p>Error: 'Ya existe una categoria con el mismo Id o el mismo Nombre</div><br>";
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