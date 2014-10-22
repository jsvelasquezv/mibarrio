<?php
	//agrega el menu y entre otros, contenidos en perfil.php
	include ("perfil.php"); 
	
	echo"<div class='contenido'>";

	 	if($c_perfil->get_PermisoPerfiles()){
	 		echo "<a href='Visualizar_Productos.php?page=1'><div class='links2 links2-submit'>";
			echo "<b>Visualizar Productos</b></div></a><br><br>";

			echo "<a href='Crear_Producto.php?gestion=visualizar'><div class='links2 links2-submit'>";
			echo "<b>Crear Producto</b></div></a><br><br>";

			echo "<a href='Visualizar_Categorias.php?page=1'><div class='links2 links2-submit'>";
			echo "<b>Visualizar Categorias</b></div></a><br><br>";

			echo "<a href='Crear_Categoria.php?gestion=crearCategoria'><div class='links2 links2-submit'>";
			echo "<b>Crear Categoria</b></div></a>";
	 		
	 	}else
			echo "<h1><i>Esto no te pertenece.</i></h1>";
		
	
	echo "</div>";	
?>