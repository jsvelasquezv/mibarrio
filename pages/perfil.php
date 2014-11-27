<?php
	// inicia session, para obtener las variaboles globales del usuario y contraseña
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>Mi Barrio</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/style.css" media="screen" type="text/css" />
<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css" type="text/css" />
<link rel="stylesheet" href="../css/bootstrap.min2.css" media="screen" type="text/css" />
<script src="../js/jquery.js"></script>

<script type="text/javascript">
	var campos = 0;

	function nuevaCapa()	{
		campos = campos + 1;
		var NvoCampo= document.createElement("div");
		NvoCampo.id= "divcampo_"+(campos);
		NvoCampo.innerHTML="<div class='form-group' id ='div_productos"+campos+"'>"+
								"<label class='col-lg-2 control-label'>"+
									"Producto:"+
								"</label>"+
								"<div class='col-lg-3' id='productos"+campos+"'>"+
	                            "</div>"+
	                            "<div class='col-lg-2'>"+
                                	"<input type='text' id='cantidad"+campos+"' name='cantidad"+campos+"' onBlur='verificarEntrada("+campos+")' placeholder='Cantidad' required='required' class='form-control'/>"+
                            	"</div>"+
	                            "<div class='col-lg-2'>"+
                                	"<input type='text' id='precioUnidad"+campos+"' readonly=true placeholder='precio c/u'  required='required' class='form-control'/>"+
                            	"</div>"+
	                            "<div class='col-lg-2'>"+
                                	"<input type='text' id='precioTotal"+campos+"' readonly=true placeholder='precio total' required='required' class='form-control'/>"+
                            	"</div>"+
	                            "<div class='col-lg-1'>"+
                                	"<button class='btn btn-danger' type='button' onclick='borrarCapa("+campos+")' ><i class='fa fa-times'></i></button>"+
                            	"</div>"+
							"</div>";
		var contenedor= document.getElementById("contenedorProductos");
	    contenedor.appendChild(NvoCampo);
	      $.post("../script/Buscar_Productos.php",
  			{
		    num_pro:campos	
		  	},
		  function(data,status){
		    $("div #productos"+campos).html(data);
		  });
	    //var pro = document.getElementById("productos"+campos);
	    //pro.appendChild(Productos);
	    //$("#contenedorProductos").load("hola.txt");

	}

	function borrarCapa(iddiv){
		$("#precioTotalfactura").val(parseInt($("#precioTotalfactura").val())-parseInt($("#precioTotal"+iddiv).val()));
		$("#div_productos"+iddiv).remove();
	}


	//funcion para asignarle los valores de los productos a los campos de valor unitario y valor total
	function verificarEntrada(control)
	{	
		var cantidad = $("#cantidad"+control).val();
		var product = $("#select_productos"+control).val();
		if($.isNumeric( cantidad ) && cantidad>0){ // verifica que sea numero y que sea mayor de 0

			var precioFactura = $("#precioTotalfactura").val(); // variable donde se guarda el precio total de la factura que tiene ese momento 
			var preciototalProducto = $("#precioTotal"+control).val();// se guarda el precio total de los productos que llamo la funcion 
			if(precioFactura == ""){ // si los campos son null aca se le asigna un cero 
				precioFactura = 0;
			}
			if(preciototalProducto == ""){
				preciototalProducto = 0;
			}

		   	$("#precioTotalfactura").val(parseInt(precioFactura)-parseInt(preciototalProducto));// asigna al label el valor total de la factura 
			$.post("../script/Buscar_Precio_Producto.php",
	  			{
			    id_pro:product	
			  	},
			  function(data,status){
			  	var cant = data.substr(data.indexOf("<l>")+4);// saca la cantidad del producto que le llega por el ajax 
			  	var precio = data.substr(0,data.indexOf("<l>")-1); // saca el precio del producto que le llega por el ajax 
			  	if(cantidad<=parseInt(cant)){ // verifica que la catidad no sea mayor a la que hay en el inventario 
				    $("div #precioUnidad"+control).val(precio); // asigna al label el valor unitario del producto 
				   	$("#precioTotal"+control).val(parseInt(precio)*cantidad); // asigna al label correspondiente el valor total del producto 
				   	$("#precioTotalfactura").val(parseInt($("#precioTotalfactura").val())+parseInt(precio)*cantidad);// asigna al label el valor total de la factura 
			  	}else{
			  		$("#cantidad"+control).val("");
			  		$("div #precioUnidad"+control).val("");
			  		$("#precioTotal"+control).val("");
			  		alert("La cantidad del producto en la fila "+(control+1)+" no esta disponible");
			  	}
			  });
		}else{
			$("#cantidad"+control).val("");
		}
	}

	$(document).ready(function(){
		var num_campos = parseInt($("#campostotales").val());
		if ($("#campostotales").val()!="")
			campos = num_campos-1;

		if(campos!=0){
			var aux = 0;
			for(var i = 0;i<=campos;i++){
				aux += parseInt($("#precioTotal"+i).val());
			}
			$("#precioTotalfactura").val(aux);
		}else{
			$("#precioTotalfactura").val(0);
		}
	});


</script>

</head>
<body>

<div class="container">
	<div class="row">
		<br>
		<div class="col-md-6"></div>
		<div class="col-md-6"><br><br><br>
			<div class="navbar  navbar-default "><!-- navbar-fixed-bottom -->
				<?php 
					include_once '../modelos/Modelo_Usuario.php';
					include_once '../controladores/Controlador_Usuario.php';
					include_once '../controladores/Controlador_Perfil.php';
					include_once '../modelos/Modelo_Perfil.php';
					// se crean los objetos que se usaran para mostrar el menu dependiendo de los permisos
					$c_usuario = new Controlador_Usuario();
					$m_usuario = new Modelo_Usuario($c_usuario);
					// se obtiene el usuario que inicio sesion
					$usuario=$_SESSION['nick'];	
					$m_usuario->buscar_Usuario($usuario);

					// imprime el nombre de usuario abajo de la imagen, en el menu
					
					//echo "<h1 class='text-center'>".$c_usuario->get_Usuario()."</h1>"; 
					// se incluyen las clases a usar, en caso de no haber sido incluidas antes

					// se crean los objetos que se usaran en la impresion del menu
					$c_perfil = new Controlador_Perfil();
					$m_perfil = new Modelo_Perfil($c_perfil);
					// se busca el perfil asociado al usuario que inicio session 
					$m_perfil->buscar_Perfil2($c_usuario->get_Perfil());
					$m_perfil->desconectarBD();

					//aqui verifica si la clave dela sesion iniciada es la misma de la BD, en caso sontraio devuelve a login

					if (!isset($_SESSION['clave']))
							header("Location: ../index.php");

					elseif($c_usuario->get_Password()!=$_SESSION['clave'])
							header("Location: ../index.php");
					else{
						// se imprime la imagen del usuario que inicio sesion
				?>
					 <div class="navbar-header">
					 	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
						      <span class="icon-bar"></span>
						      <span class="icon-bar"></span>
						      <span class="icon-bar"></span>
						    </button>
				<?php
						echo "<img class='img-rounded ' src='".$c_usuario->get_Foto()."' border='0' width='50' height='50'>";

				?>
					</div>
					<div class="navbar-collapse navbar-inverse-collapse collapse" aria-expanded="false" style="height: 1px;">
						 <ul class="nav navbar-nav">		
				<?php
							echo "<li ><a>".$c_usuario->get_Usuario()." </a></li>";			
							
							echo "
								<li><a > Tipo de perfil:  ".$c_perfil->get_Nombre()."</a></li>";
							echo "</ul>	";
				?>				
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href='../script/Cerrar_sesion.php' >Cerrar sesi&oacute;n
								<i class="fa fa-power-off"></i></a>
							</li>	
						</ul>
					</div>	
			</div>
			<br>
		</div>
	</div>
<div class="row"> 
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			      <span class="icon-bar"></span>
			    </button>
			    <a class="navbar-brand" href="Welcome.php?gestion=inicio">Menu</a>
			</div>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">

					<?php

						
					// de acuerdo a los permisos del perfil, imprime o no los links de cada permiso
					/* echo"<label for='show-menu' class='show-menu'>Menu</label>
					<input type='checkbox' id='show-menu' role='button'>";*/

					//echo"<ul id='menu'>";

					$enlace_sistema = "bajo";
					if($c_perfil->get_PermisoSistema()){
						$enlace_sistema = "alto";
					
					echo " <li class='dropdown'>
							 	<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' >
							 		Gesti&oacute;n de usuarios <b class='caret'></b> 
						 		</a> 
						 		<ul class='dropdown-menu'>
			 			          <li><a href='Crear_Usuario.php?gestion=crearPerfil'><b>Crear usuario</b></a></li>
						          <li><a href='Ver_Usuario.php?page=1'><b>Visualizar usuario</b></a></li>
						 		</ul>
						 	</li>";
					}
//Sistema.php?gestion=$enlace_sistema
					if($c_perfil->get_PermisoPerfiles()){

						echo "
							<li class='dropdown'>
							 	<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' >
							 		Gesti&oacute;n Perfil <b class='caret'></b> 
						 		</a> 
						 		<ul class='dropdown-menu'>
			 			          <li><a href='Crear_Perfil.php?gestion=crearPerfil'><b>Crear Perfil</b></a></li>
						          <li><a href='Crear_Perfil.php?gestion=visualizar'><b>Visualizar Perfil</b></a></li>
						 		</ul>
						 	</li> ";
//Gestion_Perfil.php?gestion=perfil
					}
					if($c_perfil->get_PermisoInventario()){
						echo "
							<li class='dropdown'>
							 	<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' >
							 		Inventario <b class='caret'></b> 
						 		</a> 
						 		<ul class='dropdown-menu'>
						 			<li class='dropdown-header'>Productos</li>
			 			          	<li><a href='Visualizar_Productos.php?page=1'><b>Visualizar Productos</b></a></li>
						          	<li><a href='Crear_Producto.php?gestion=visualizar'><b>Crear Producto</b></a></li>
						          	<li class='divider'></li>
          							<li class='dropdown-header'>Categoría</li>
			 			          	<li><a href='Visualizar_Categorias.php?page=1'><b>Visualizar Categorías</b></a></li>
						          	<li><a href='Crear_Categoria.php?gestion=crearCategoria'><b>Crear Categoría</b></a></li>
						 		</ul>
						 	</li>";
//Inventario.php
					}
					if($c_perfil->get_PermisoCliente()){
						echo "
							<li class='dropdown' >
							 	<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' >
							 		Clientes <b class='caret'></b> 
								<ul class='dropdown-menu'>
			 			          	<li><a href='Crear_Cliente.php?gestion=crearCliente'><b>Crear Cliente</b></a></li>
						 		</ul>
							</li>";
					}
					if($c_perfil->get_PermisoFacturacion()){
						echo "
							<li class='dropdown' >
							 	<a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false' >
							 		Facturacion <b class='caret'></b> 
								<ul class='dropdown-menu'>
			 			          	<li><a href='Crear_Factura.php?gestion=crearFactura'><b>Crear Factura</b></a></li>
			 			          	<li><a href='Visualizar_Facturas.php'><b>Visualizar Facturas</b></a></li>
						 		</ul>
							</li>";

					}
					if($c_perfil->get_PermisoVenta()){
						echo "
						    <li class='dropdown' >
						      <a href='#' class='dropdown-toggle' data-toggle='dropdown' aria-expanded='false'>
						         Cajero <b class='caret'></b> 
								</a>
							<ul class='dropdown-menu'>
			 			          	<li><a href='Visualizar_Facturas_Sin_Registrar.php?gestion=verFacturas'><b>Visualizar Facturas</b></a></li>
						 	</ul> 
							</li>";
					}

					if($c_perfil->get_PermisoReportes()){
						echo "<li><a href='#'>Reportes</a></li>";
					}
					//echo"</ul>";

					// imprime el nombre del perfil asociado al usuario

					}


					?>
				</ul>
			</div>
		</div>
</div>



