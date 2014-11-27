<?php		
	    include_once '../modelos/Modelo_Producto.php';
	    include_once '../controladores/Controlador_Producto.php';
	    include_once '../modelos/Modelo_Factura.php';				
	    include_once '../controladores/Controlador_Factura.php';
	    include '../mpdf/mpdf.php'; // libreria para crear los pdfs

	$id_factura =  $_REQUEST['id_factura'];// el id de la factura que se va a registrar 
        $c_factura = new Controlador_Factura();
        $m_factura = new Modelo_Factura($c_factura);

		ob_start();
		$info_factura = $m_factura->infoFactura_infoCliente($id_factura); // acá esta la informacion de la factura 
    	$info_productos = $m_factura->productos_Factura2($id_factura);
		// este el String que contiene la informacion que va a tener el pdf 
$body = "<!DOCTYPE html> 
<html lang='en'>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<style>

</style>
</head>
<body>
<table style='width:100%'>
	<tr>
		<td>Factura # :</td>
		<td>".$info_factura[0][0]."</td>		                        
	</tr>
	<tr>
		<td><label  class='col-lg-1 control-label'>Fecha: </label></td>
		<td><label  class=' col-lg-2 form-control'> ".$info_factura[0][1]."</label></td>
	</tr>
</table> <hr>
<table 	style='width:100%' >
	<tr>
		<td>Vendedor:       </td>
		<td>Identificación:      </td>
		<td>Nombre:      </td>
	</tr>
	<tr>
		<td></td>
		<td>".$info_factura[0][3]."</td>
		<td>".$info_factura[0][2]."</td>
	</tr>
</table><hr>
<table style='width:100%'  >
	<tr>	
		<td>Cliente:</td>
		<td>Documento:</td>
		<td>Nombre:</td>
		<td>Apellido:</td>
		<td>Direccion:</td>
		<td>Telefono:</td>
		<td>E-mail:</td>
	</tr>
	<tr><td></td>	
		<td>".$info_factura[0][12]."</td>
		<td>".$info_factura[0][4]."</td>
		<td>".$info_factura[0][9]."</td>
		<td>".$info_factura[0][13]."</td>
		<td>".$info_factura[0][11]."<td>
		<td>".$info_factura[0][10]."</td>
	</tr>
</table>
<hr>
<table style='width:100%'  >
	<tr>	
		<td>ID Producto </td>
		<td>Nombre Producto </td>
		<td>Cantidad</td>
		<td>Precio Unidad</td>
		<td>Precio Total</td>
	</tr><br>
	<tr><br></tr>";

for($i=0;$i<count($info_productos);$i++){
            $body .="<tr>
	                    <td>".$info_productos[$i][2]."</td>
	                   	<td>".$info_productos[$i][5]."</td> 
	                    <td>".$info_productos[$i][3]."</td> 
	                    <td>".$info_productos[$i][4]."</td> 
	                    <td>".(intval($info_productos[$i][4])*intval($info_productos[$i][3]))."</td> 
                	</tr>";
}

		                 $body .="
</table><hr>
<table style='width:100%'  >
	<tr>	
		<td>Valores Totales:</td>
		<td>IVA TOTAL:</td>
		<td>Valor Total Sin IVA:</td>
		<td>Valor Total Con IVA:</td>
	</tr>
	<tr><td></td>	
		<td>".$info_factura[0][5]."</td>
		<td>".$info_factura[0][6]."</td>
		<td>".$info_factura[0][7]."</td>
	</tr>
</table> 
    </body>
</html>";
$mpdf=new mPDF();// funciones para generar el pdf 
$mpdf->WriteHTML($body);
$mpdf->Output("Factura".$id_factura, 'D');

?>
