<?php

	include ("perfil.php"); 

    include_once '../modelos/Modelo_Cliente.php';
    include_once '../controladores/Controlador_Cliente.php';
    include_once '../controladores/Controlador_Producto.php'; 
    include_once '../controladores/Controlador_Categoria.php';
    include_once '../modelos/Modelo_Producto.php';
    include_once '../modelos/Modelo_Categoria.php';
    include_once '../modelos/Modelo_Factura.php';               
    include_once '../controladores/Controlador_Factura.php';
    //echo $_REQUEST['gestion'];
	$numero_error=$_REQUEST['gestion'];
    $_perfi = $c_usuario->get_Perfil(); 

    switch ($numero_error){ 
    default:
?>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class='panel-heading'>
                <h2 class='panel-title text-center'>Facturacion</h2>
            </div>
            <div class=' panel-body'>
              <form action='../script/Crear_Factura.php' method='post' class="form-horizontal">
                <fieldset>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Vendedor:</label>
                        <div class='col-lg-2'><?php 
                            echo"<label  class=' col-lg-1 form-control'>".$c_usuario->get_Nombres()."</label>";
                            echo"<input class='hide' name='id_vende' value='".$c_usuario->get_Nid()."'/>";
                            echo"<input class='hide' id='campostotales' value='1'/>";

                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Fecha: </label>
                        <div class='col-lg-3'><?php 
                            echo"<label  class=' col-lg-2 form-control'>".date("d ")." De ".date(" F ")." Del ".date("Y")."</label>";
                            echo"<input class='hide' name='fecha' value='".date("d F Y ")."'/>";
                            ?>
                        </div>
                        <label  class='col-lg-2 control-label'>Factura # : </label>
                        <div class='col-lg-1'><?php 
                            $c_factura = new Controlador_Factura();
                            $m_factura = new Modelo_Factura($c_factura);
                            $cantidad = $m_factura->getNumeroFacturas()+1;
                            echo"<label  class=' col-lg-1 form-control'>".$cantidad."</label>";
                            echo"<input class='hide' name='id_Factura' value='".$cantidad."'/>";
                            ?>
                        </div>

                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Cliente:</label>
                        <div class='col-lg-3'>
<?php       
                           //Aqui el algoritmo para hacer un combobox para los Clientes
                            $c_clientes = new Controlador_Cliente();
                            $m_clientes = new Modelo_Cliente($c_clientes);
                            $arr_clientes = $m_clientes->mostrar_Todos();
                            $tam_clientes = count($arr_clientes);
                            $combobit = "";
                            for($i = 0; $i < $tam_clientes; $i++){
                                    $combobit .=" <option value='".$arr_clientes[$i][0]."' selected>".$arr_clientes[$i][1]."</option>";
                            }
                            if($c_perfil->get_PermisoFacturacion())
                                echo "<select name='id_cliente' class='form-control'>".$combobit."</select>";
                            else echo "<select name='id_cliente' class='form-control' disabled>".$combobit."</select>";
?>
                        </div>
                    </div>
                    <hr>
                    <div class='form-group hidden-xs  hidden-sm hidden-md' >
                        <label  class='col-lg-3 control-label'><center> Producto </center></label>
                        <label  class='col-lg-2 control-label'><center>Nombre Producto </center></label>
                        <label  class='col-lg-2 control-label'><center>Cantidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Unidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Total </center></label>

                <hr>
                    </div>
                    <div id="contenedorProductos" >  
                        <div class='form-group' id ='div_productos0'>
                            <label  class='col-lg-2 control-label'>Producto :</label>
                            <div class='col-lg-3'>
    <?php       
                                $c_producto = new Controlador_Producto();
                                $m_producto = new Modelo_Producto($c_producto);
                                echo $m_producto->crear_select($c_perfil->get_PermisoFacturacion(),0);
    ?>
                            </div>
                            <div class='col-lg-2'>
                                <input id='cantidad0'type='text' name='cantidad0' onBlur="verificarEntrada(0)" placeholder='Cantidad' required='required' class='form-control'/>
                            </div>
                            <div class='col-lg-2'>
                                <input type='text' id="precioUnidad0" readonly=true placeholder='precio c/u' required='required' class='form-control'/>
                            </div>
                            <div class='col-lg-2'>
                                <input type='text' id="precioTotal0"  readonly=true placeholder='precio total' required='required' class='form-control'/>
                            </div>
                        </div>
                    </div>
                        <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Mas Productos:</label>
                        <div class='col-lg-5'>
                            <button class="btn btn-success" type="button" onclick="nuevaCapa()" ><i class="fa fa-plus"></i></button>
                        </div>
                        <label  class='col-lg-2 control-label'>Precio Total De la Factura :</label>
                        <div class='col-lg-2'>
                            <input type='text' id="precioTotalfactura" value="0" readonly=true placeholder='precio Total Factura' class='form-control'/>
                        </div>
                    </div>


                    <div class='form-group' >
                        <div class='col-lg-9 col-lg-offset-3'>        
                            <input type='submit'  class='btn btn-primary' value='Crear Factura'>
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
	echo "<div class='alert alert-dismissable alert-success'><h1><i>Factura Creada</i></h1></div'>";
break; 
case 2:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado La Factura.</i></h1>";
    echo "<p>Error: El id de la factura ya existe </div><br>";
break;
case 3:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado La Factura.</i></h1>";
    echo "<p>Error: Los Productos Ya Existen </div><br>";
break;
case 4:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha Modificado La Factura.</i></h1>";
    echo "<p>Error: La factura debe tener 1 Producto como minimo </div><br>";
break;
case 5:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha Modificado La Factura.</i></h1>";
    echo "<p>Error: No se encontro la Factura  </div><br>";
break;
case 6:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha Modificado La Factura.</i></h1>";
    echo "<p>Error: No se modificaron los productos  </div><br>";
break;
case 7:
    echo "<div class='alert alert-dismissable alert-success'><h1><i>La Factura Fue Modificada </i></h1></div'>";
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
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/npm.js"></script>
        <!--<script src="../js/formularioDinamico.js"></script>-->
    </body>
</html>