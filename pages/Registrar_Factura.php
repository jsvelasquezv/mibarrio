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


    $info_factura = $m_factura->infoFactura_infoCliente($id_factura); // acá esta la informacion de la factura 
    $info_productos = $m_factura->productos_Factura2($id_factura);// acá esta la informacion de los productos de esta factura 
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
              <form action='../script/Registrar_Factura.php' method='post' class="form-horizontal">
                <fieldset>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Factura :</label>
                        <label  class='col-lg-2 control-label'>ID Factura :</label>
                        <div class='col-lg-2'><?php 
                            echo"<label  class=' col-lg-1 form-control'>".$info_factura[0][0]."</label>";
                            echo"<input class='hide' name='id_factura' value='".$info_factura[0][0]."'/>";
                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Fecha: </label>
                        <div class='col-lg-3'><?php 
                            echo"<label  class=' col-lg-2 form-control'>".$info_factura[0][1]."</label>";
                            ?>
                        </div>
                    </div> <hr>
                    <div class='form-group' >
                        <label  class='col-sm-2 control-label'>Vendedor:</label>
                        <label  class='col-lg-2 control-label'>Identificación:</label>
                        <div class='col-lg-2'><?php 
                            echo"<label  class=' col-lg-1 form-control'>".$info_factura[0][3]."</label>";
                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Nombre: </label>
                        <div class='col-lg-3'><?php 
                            echo"<label  class=' col-lg-2 form-control'>".$info_factura[0][2]."</label>";
                            ?>
                        </div>
                    </div><hr>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>Cliente:</label>
                        <label  class='col-lg-2 control-label'>Documento:</label>
                        <div class='col-lg-2'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][12]."</label>";
                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Nombre:</label>
                        <div class='col-lg-3'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][4]."</label>";
                            ?>
                        </div>
                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'></label>
                        <label  class='col-lg-2 control-label'>Direccion :</label>
                        <div class='col-lg-2'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][13]."</label>";
                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>Apellidos:</label>
                        <div class='col-lg-3'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][9]."</label>";
                            ?>
                        </div>
                    </div>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'></label>
                        <label  class='col-lg-2 control-label'>Telefono :</label>
                        <div class='col-lg-2'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][11]."</label>";
                            ?>
                        </div>
                        <label  class='col-lg-1 control-label'>E-mail:</label>
                        <div class='col-lg-3'>
                            <?php
                            echo"<label  class=' form-control'>".$info_factura[0][10]."</label>";
                            ?>
                        </div>
                    </div>
                    <hr>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'><center>ID Producto </center></label>
                        <label  class='col-lg-3 control-label'><center>Nombre Producto </center></label>
                        <label  class='col-lg-2 control-label'><center>Cantidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Unidad</center></label>
                        <label  class='col-lg-2 control-label'><center>Precio Total </center></label>

                    </div>
                    <hr>
                    <div id="contenedorProductos" >  
<?php           
                        for($i=0;$i<count($info_productos);$i++){
                            echo "<div class='form-group' id ='div_productos$i'>
                                    <label  class='col-lg-2 control-label'><center>".$info_productos[$i][2]."</center></label>
                                           <label  class=' text-left col-lg-3 control-label'><center>".$info_productos[$i][5]."</center></label> ";
                                    echo "
                                    <label  class=' col-lg-2 control-label'><center>".$info_productos[$i][3]."</center></label> 
                                    <label  class=' col-lg-2 control-label'><center>".$info_productos[$i][4]."</center></label> 
                                    <label  class=' col-lg-2 control-label'><center>".(intval($info_productos[$i][4])*intval($info_productos[$i][3]))."</center></label> 
                                </div>";
                        }

?>
                    </div>
                    <hr>
                    <div class='form-group' >
                        <label  class='col-lg-2 control-label'>IVATotal:</label>
                        <label  class='col-lg-2 control-label'><center> $ <?php echo $info_factura[0][5]; ?></center></label>
                        <label  class='col-lg-2 control-label'>Valor Total Sin IVA :</label>
                        <label  class='col-lg-2 control-label'><center> $ <?php echo $info_factura[0][6]; ?></center></label>
                        <label  class='col-lg-2 control-label'>Valor Total Con IVA :</label>
                        <label  class='col-lg-2 control-label'><center> $ <?php echo $info_factura[0][7]; ?></center></label>
                    </div>


                    <div class='form-group' >
                        <div class='col-lg-3 col-lg-offset-3'>        
                            <input type='submit'  class='btn btn-primary' value='Registrar Factura'>
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
	echo "<div class='alert alert-dismissable alert-success'>
    <h1><i>Factura Creada</i></h1>
    <a class='btn btn-primary' href='../script/Crear_PDF.php?id_factura=$id_factura'>Imprimir</a>
    </div'>";
break; 
case 2:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha creado La Factura.</i></h1>";
    echo "<p>Error: El id de la factura ya existe </div><br>";
break;
case 3:
    echo "<div class='alert alert-dismissable alert-danger'><h1><i>No se ha registrado La Factura.</i></h1>";
    echo "<p>Error: la cantidad de productos en el stock no es suficiente para registrar la factura</div><br>";
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