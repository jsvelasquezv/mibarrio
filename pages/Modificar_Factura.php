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
    $id_factura = $_REQUEST['id_Factura'];
    $_perfi = $c_usuario->get_Perfil(); 
    $c_factura = new Controlador_Factura();
    $m_factura = new Modelo_Factura($c_factura);
    $c_producto = new Controlador_Producto();
    $m_producto = new Modelo_Producto($c_producto);


    $info_factura = $m_factura->infoFactura($id_factura); // acá esta la informacion de la factura 
    $info_productos = $m_factura->productos_Factura($id_factura);// acá esta la informacion de los productos de esta factura 
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
              <form action='../script/Modificar_Factura.php' method='post' class="form-horizontal">
                <fieldset>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Vendedor:</label>
                        <div class='col-lg-2'><?php 
                            echo"<label  class=' col-lg-1 form-control'>".$info_factura[0][3]."</label>";
                            echo"<input class='hide' name='id_vende' value='".$info_factura[0][2]."'/>";
                            echo"<input class='hide' id='campostotales' value='".count($info_productos)."'/>";

                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Fecha: </label>
                        <div class='col-lg-3'><?php 
                            echo"<label  class=' col-lg-2 form-control'>".$info_factura[0][1]."</label>";
                            echo"<input class='hide' name='fecha' value='".$info_factura[0][1]."'/>";
                            ?>
                        </div>
                        <label  class='col-lg-2 control-label'>Factura # : </label>
                        <div class='col-lg-1'><?php 
                            echo"<label  class=' col-lg-1 form-control'>".$info_factura[0][0]."</label>";
                            echo"<input class='hide' name='id_Factura' value='".$info_factura[0][0]."'/>";
                            ?>
                        </div>

                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Cliente:</label>
                        <div class='col-lg-3'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][5]."</label>";
                            echo"<input class='hide' name='id_cliente' value='".$info_factura[0][4]."'/>";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'><center> Producto </center></label>
                        <label  class='col-lg-3 control-label'><center>Nombre Producto </center></label>
                        <label  class='col-lg-2 control-label'><center>Cantidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Unidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Total </center></label>

                    </div>
                    <hr>
                    <div id="contenedorProductos" >  
<?php           
                       /* <div class='form-group' id ='div_productos0'>
                            <label  class='col-lg-2 control-label'>N° 1:</label>
                            <div class='col-lg-2'>
                                $c_producto = new Controlador_Producto();
                                $m_producto = new Modelo_Producto($c_producto);
                                echo $m_producto->crear_select($c_perfil->get_PermisoFacturacion(),0);
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
                        </div>*/
                        for($i=0;$i<count($info_productos);$i++){
                            echo "<div class='form-group' id ='div_productos$i'>
                                    <label  class='col-lg-2 control-label'>Producto:</label>
                                        <div class='col-lg-3'>";
                                            $select = $m_producto->crear_select2($c_perfil->get_PermisoFacturacion(),$i,$info_productos[$i][2]);
                                            echo $select;
                                        echo "</div>
                                            <div class='col-lg-2'>
                                                <input id='cantidad$i'type='text' name='cantidad$i' onBlur='verificarEntrada($i)' value=".$info_productos[$i][3]." placeholder='Cantidad' required='required' class='form-control'/>
                                            </div>
                                            <div class='col-lg-2'>
                                                    <input type='text' id='precioUnidad$i' value='".$info_productos[$i][4]."'readonly=true placeholder='precio c/u' required='required' class='form-control'/>
                                            </div>
                                            <div class='col-lg-2'>
                                                    <input type='text' id='precioTotal$i' value='".(intval($info_productos[$i][4])*intval($info_productos[$i][3]))."' readonly=true placeholder='precio total' required='required' class='form-control'/>
                                            </div>
                                            <div class='col-lg-1'>
                                                <button class='btn btn-danger' type='button' onclick='borrarCapa($i)' ><i class='fa fa-times'></i></button>
                                            </div>
                                        </div>";
                        }

?>
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
                        <div class='col-lg-3 col-lg-offset-3'>        
                            <input type='submit'  class='btn btn-primary' value='Modificar Factura'>
                        </div>
                        <div class='col-lg-3'>        
                            <input type='reset'  class='btn btn-primary hide' value='Restaurar Campos'>
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