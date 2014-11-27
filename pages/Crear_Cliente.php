<?php

	include ("perfil.php"); 
    //echo $_REQUEST['cliente'];
	$numero_error=$_REQUEST['gestion'];
    switch ($numero_error){ 
    default:
?>
    <div class="row">
        <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class='panel-heading'>
                <h2 class='panel-title text-center'>Crear Cliente</h2>
            </div>
            <div class=' panel-body'>
              <form action='../script/Crear_Cliente.php' method='post' class="form-horizontal">
                <fieldset>
                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Nombre</label>
                        <div class='col-lg-9'>
                            <input type='text' name='nom'  placeholder='Nombre Minimo 2 caracteres' required='required' class='form-control' maxlength=30/>
                        </div>
                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Apellidos:</label>
                        <div class='col-lg-9'>
                            <input type='text' name='apell'  placeholder='Apellidos Minimo 2 caracteres' required='required' class='form-control'maxlength=30/>
                        </div>
                    </div>

                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Correo Electrónico:</label>
                        <div class='col-lg-9'>        
                            <input type='text' name='e_mail'  placeholder='Correo Electr&oacute;nico Minimo 6 caracteres' required='required' class='form-control' maxlength=60/>
                        </div>
                    </div>

                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Teléfono:</label>
                        <div class='col-lg-9'>
                            <input type='text' name='celu'  placeholder='Tel&eacute;fono Minimo 8 caracteres' required='required' class='form-control' maxlength=10/>           
                        </div>
                    </div>

                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Documento:</label>
                        <div class='col-lg-9'>
                            <input type='text' name='doc'  placeholder='Documento Minimo 8 caracteres' required='required' class='form-control' maxlength=15/>
                        </div>
                    </div>

                    <div class='form-group' >
                        <label  class='col-lg-3 control-label'>Dirección:</label>
                        <div class='col-lg-9'>
                            <input type='text' name='dire'  placeholder='Direcci&oacute;n Minimo 2 caracteres' required='required' class='form-control' maxlength=30/>
                        </div>
                    </div>
                    
                    <div class='form-group' >
                        <div class='col-lg-9 col-lg-offset-3'>        
                            <input type='submit' name='crear' class='btn btn-primary' value='Registrar Cliente'>    <!--usuario-->
                        </div>
                    </div>

                </fieldset>
              </form>
          </div>
          </div>
        </div>
    </div>
<?php
  


break;
case 1:
	echo "<div class='alert alert-dismissable alert-success'><h1><i>Se ha creado el Cliente.</i></h1></div'>";
break;
case 2:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Nombres' m&iacute;nimo: 2 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break; 
case 3:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Apellidos' m&iacute;nimo: 2 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 4:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Correo Electr&oacute;nico' m&iacute;nimo: 6 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 5:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Documento' m&iacute;nimo: 8 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;

case 6:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Direcci&oacute;' m&iacute;nimo: 2 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;

case 7:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Tama&ntilde;o 'Tel&eacute;fono' m&iacute;nimo: 8 caracteres</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 8:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Documento' tipo de dato debe ser Num&eacute;rico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;

case 9:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Nombres' tipo de dato debe ser Alfab&eacute;tico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 10:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Apellidos' tipo de dato debe ser Alfab&eacute;tico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
          </div><br>";
break;
case 11:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Tel&eacute;fono' tipo de dato debe ser Num&eacute;rico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 12:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Correo Electr&oacute;nico' tipo de dato debe ser Alfanum&eacute;rico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 13:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Validaci&oacute;n: 'Direcci&oacute;n' tipo de dato debe ser Alfanum&eacute;rico</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
case 14:
    echo "<div class='alert alert-dismissable alert-warning'><h1><i>No se ha creado el Cliente.</i></h1>";
    echo "<p>Error: Un Cliente con este Documento ya se encuentra registrado !!! Por favor intenta de nuevo</p>
            <a class='btn btn-primary' href='javascript:history.back()'> Volver Atrás</a> 
        </div><br>";
break;
}


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
