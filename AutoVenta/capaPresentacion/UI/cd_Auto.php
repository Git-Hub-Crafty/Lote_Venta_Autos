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
		function preguntar(valor){
			if (confirm('Esta usted seguro de eliminar el registro: ' + '\n' + 'Matricula: ' + valor + " ?" )) {
				location.href = "../UIL/manipulacion.php?del_Auto=" + valor;
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
					$mtl = $_GET[btn_Query];
					$conexion = new conexion();
					$conn = $conexion->enlace();
					$sql_Select = "SELECT * FROM autos WHERE matricula='".$mtl."'";
					$res_Select = $conn->query($sql_Select);
					$Fila = $res_Select->fetch_array();
				?>
			    <table class="table">
			         <tr bgcolor="black" style="color:white">
				        <th class="default txtline"><strong>Descripcio&#769n:</strong></th>
				        <td class="default"><strong>Datos</strong></td>
				    </tr>
			        <tr>
			        	<th class="info txtline">Matricula:</th>
				        <td class="success"><?php echo $Fila[matricula]; ?></td>
			        </tr>
			        <tr>
			        	<td class="info txtline">Marca:</td>
			        	<td class="success"><?php echo $Fila[marca]; ?></td>
			        </tr>
			       <tr>
			       		<td class="info txtline">Modelo:</td>
			       		<td class="success"><?php echo $Fila[modelo]; ?></td>
			       </tr>
			       <tr>
			       		<td class="info txtline">Color:</td>
			       		<td class="success"><?php echo $Fila[color]; ?></td>
			       </tr>
			       <tr>
			       		<td class="info txtline">Antiguedad:</td>
			       		<td class="success"><?php echo $Fila[antiguedad]; ?></td>
			       </tr>
			       <tr>
			       		<td class="info txtline">Potencia:</td>
			       		<td class="success"><?php echo $Fila[potencia]; ?></td>
			       </tr>
			       <tr>
			       		<td class="info txtline">Velocidad:</td>
			       		<td class="success"><?php echo $Fila[velocidad] ?></td>
			       </tr>
			       <tr>
			       		<td class="info txtline">Precio:</td>
			       		<td class="success"><?php echo $Fila[precio] ?></td>
			       </tr>
				</table>
			</div>
			<div class="col-xs-2"></div>
			</div>
			<div class="row">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align:right">
					<button type="button" class="btn btn-primary" onclick='location.href="act_Auto.php?btn_Edit=<?php echo $Fila[matricula]; ?>"'>Editar</button>
					<button type="button" class="btn btn-danger" onclick='preguntar("<?php echo $Fila[matricula]; ?>");'>Eliminar</button>
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