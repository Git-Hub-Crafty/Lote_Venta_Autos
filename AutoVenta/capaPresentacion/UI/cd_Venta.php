<?php 
	include ('../UIL/main.php'); 
	session_start();
	if (usuario()) {
?>
<!DOCTYPE html>
<html>
	<head>
		<?php 
			cabecera();
		?>
		<script>
			function preguntar(dato){
				if (confirm("¿Esta usted seguro de eliminar el siguiente registro:" + '\n' + "Folio: " + dato + " ?")) {
					location.href = "../UIL/manipulacion.php?del_Venta=" + dato;
				}else{
					return 0;
				}
			}
		</script>
		<style>
			.txtline{
				text-align:right;
			}
		</style>
	</head>
	<body style="background-color:lightblue">
		<?php 
			indice();
		?>
		<br/>
		<div class="container">
			<h2>Consulta Detallada</h2>
			<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">  
				<?php
					require ('../../capaDatos/conexion.php');
					$fl =  $_GET[btn_Query];
					$conectar = new conexion();
					$conn = $conectar->enlace();
					$sql_Select = "SELECT * FROM ventas WHERE folio=".$fl;
					$res_Select = $conn->query($sql_Select);
					$Array = $res_Select->fetch_array();
				?>
			    <table class="table">
			         <tr bgcolor="black" style="color:white">
				        <th class="default txtline"><strong>Descripcio&#769n:</strong></th>
				        <td class="default"><strong>Datos</strong></td>
				    </tr>
			        <tr>
			        	<th class="info txtline">Folio:</th>
				        <td class="success"><?php echo $Array[folio]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">CV de Cliente:</td>
			        	<td class="success"><?php echo $Array[cv_Cliente]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Nombre de Cliente:</td>
			        	<td class="success"><?php echo $Array[name_Cliente]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">IFE de Empleado:</td>
			        	<td class="success"><?php echo $Array[cv_Empleado]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Nombre de Empleado:</td>
			        	<td class="success"><?php echo $Array[name_Empleado]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Matricula de Auto:</td>
			        	<td class="success"><?php echo $Array[cv_Auto] ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Marca:</td>
			        	<td class="success"><?php echo $Array[marca]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Descripcio&#760n:</td>
			        	<td class="success"><?php echo $Array[descripcion]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Precio:</td>
			        	<td class="success"><?php echo $Array[precio]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Fecha de Venta:</td>
			        	<td class="success"><?php echo $Array[fecha_Venta]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Fecha de Entrega</td>
			        	<td class="success"><?php echo $Array[fecha_Entrega]; ?></td>
			        </tr>
				</table>
			</div>
			<div class="col-xs-2"></div>
			</div>
			<div class="row">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align:right">
					<button type="button" class="btn btn-primary" onclick="location.href='act_Venta.php?btn_Edit=<?php echo $Array[folio]; ?>'">Editar</button>
					<button type="button" class="btn btn-danger" onclick="preguntar(<?php echo $Array[folio]; ?>);">Eliminar</button>
				</div>
				<div class="col-xs-2"></div>
			</div>
		</div>		
		
		<?php 
			PiePagina();
		?>
		</body>
</html>
<?php
	}
?>