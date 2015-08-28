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
			function preguntar(val){
				if (confirm('¿Esta usted seguro de eliminar este registro:' + '\n' + "Clave: " + val + " ?")) {
					location.href = "../UIL/manipulacion.php?del_Cliente=" + val;
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
					include ('../../capaDatos/Conexion.php');
					$id = $_GET['btn_Query'];
					$conexion = new conexion();
					$conn = $conexion->enlace();
					$sql_Select = "SELECT * FROM clientes WHERE clave=".$id;
					$res_Select = $conn->query($sql_Select);
					$fila = $res_Select->fetch_array();
					#Utlizando el array $fila[] con nombre de campo.
				?>
			    <table class="table">
			         <tr bgcolor="black" style="color:white">
				        <th class="default txtline"><strong>Descripcio&#769n:</strong></th>
				        <td class="default"><strong>Datos</strong></td>
				    </tr>
			        <tr>
			        	<th class="info txtline">Clave:</th>
				        <td class="success"><?php echo $fila['clave']; ?></td>
			        </tr>
			        <tr>
				        <th class="info txtline">Nombre:</th>
				        <td class="success"><?php echo $fila['nombre']; ?></td>
				    </tr>
				    <tr>
				        <th class="info txtline">Apellido:</th>
				        <td class="success"><?php echo $fila['apellido']; ?></td>
				    </tr>
				    <tr>
				    	 <th class="info txtline">Direccio&#769n:</th>
				        <td class="success"><?php echo $fila['direccion']; ?></td>
				    </tr>
					<tr>
				        <th class="info txtline">Tele&#769fono</th>
				        <td class="success"><?php echo $fila['telefono']; ?></td>
				    </tr>
				    <tr>
				    	 <th class="info txtline">Ciudad:</th>
				        <td class="success"><?php echo $fila['ciudad']; ?></td>
				    </tr>
				</table>
			</div>
			<div class="col-xs-2"></div>
			</div>
			<div class="row">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align:right">
					<button type="button" class="btn btn-primary" onclick="location.href='act_Cliente.php?btn_Edit=<?php echo $fila['clave']; ?>'">Editar</button>
					<button type="button" class="btn btn-danger" onclick="preguntar(<?php echo $fila['clave']; ?>);">Eliminar</button>
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