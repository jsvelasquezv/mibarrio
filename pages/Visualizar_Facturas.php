<?php

	include ("perfil.php");
	include_once '../modelos/Modelo_Factura.php';               
    include_once '../controladores/Controlador_Factura.php';
	$tam =2;
    $c_factura = new Controlador_Factura();
    $m_factura = new Modelo_Factura($c_factura);
	echo"<div class='row  well'>";

	echo"<h1><center>Visualizar Facturas</center></h1>";
	$facturas = $m_factura->infoFacturas();

	echo "<div class='row table-responsive'><table border=1 class='table table-striped table-hover '>
		<tr>
			<td><font size=1></font></td>
			<td><font size=$tam>Id Factura</font></td>
			<td><font size=$tam>Nombre Vendedor</font></td>
			<td><font size=$tam>Nombre Cliente</font></td>
			<td><font size=$tam>Fecha de Venta</font></td>
			<td><font size=$tam>Iva Total de la Factura</font></td>
			<td><font size=$tam>Valor sin Iva</font></td>
			<td><font size=$tam>Valor Total</font></td>
			<td><font size=$tam>Estado</font></td>
		</tr>
			</font> 
	";
 	if($c_perfil->get_PermisoFacturacion()){

 		for($i = 0; $i<count($facturas); $i++){
			echo "
				<tr>
					<td><font size=1><center>
							<a  href='Modificar_Factura.php?gestion=ver_Factura&&id_Factura=".$facturas[$i][0]."'data-toggle='tooltip' data-placement='top' title='Editar Factura ' >
							<i class='fa fa-pencil-square-o fa-2x'></i></a><br>
						</center></font>
					</td>
					<td><font size=$tam>".$facturas[$i][0]."</font></td>  
					<td><font size=$tam>".$facturas[$i][2]."</font></td>
					<td><font size=$tam>".$facturas[$i][3]."</font></td>
					<td><font size=$tam>".$facturas[$i][1]."</font></td>
					<td><font size=$tam>".$facturas[$i][4]."</font></td>
					<td><font size=$tam>".$facturas[$i][5]."</font></td>
					<td><font size=$tam>".$facturas[$i][6]."</font></td>			
					<td><font size=$tam>".$facturas[$i][7]."</font></td>
				</tr>";
 		}
 			echo '<tr>';
		echo "</table>";

 		
 	
 		
 	}

	echo "</div>";	
?>
		</div>
		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/npm.js"></script>
	</body>
</html>