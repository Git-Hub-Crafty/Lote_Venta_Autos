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
	</head>
	<body style="background-color:lightblue">
		<?php 
			indice();
		?>
		<div class="container">
			<h2>Consulta General de Clientes</h2>
			<div class="row">
				<div class="col-xs-1"></div>
				<div class="col-xs-10">
					<?php 
						require ('../../capaDatos/conexion.php');
						$conexion = new conexion();
						$conn = $conexion->enlace();
						$sql_Select = 'SELECT * FROM empleados';
						$res_Select = $conn->query($sql_Select);
						$num_R = $res_Select->num_rows;
						echo '<p>Nu&#769mero de Empleados encontrados: '.$num_R.'</p>';
					?>
					<table class="table">
						<thead>
							<tr bgcolor="gray" style="color:black">
								<th>Clave</th>
								<th>Nombre</th>
								<th>Apellidos</th>
								<th>Tele&#769fono</th>
								<th>Consultar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i = 0; $i < $num_R; $i++) {
									$fila = $res_Select->fetch_assoc();
									echo '<tr class="success">';
										echo '<td>'.$fila['IFE'].'</td>';
										echo '<td>'.$fila['nombre'].'</td>';
										echo '<td>'.$fila['apellido'].'</td>';
										echo '<td>'.$fila['telefono'].'</td>';
										echo  '<td><a href="cd_Empleado.php?btn_Query='.$fila["IFE"].'">Ver</a></td>';;
									echo '</tr>'; 
								}
								$res_Select->free();
								$conn->close();
							?>
						</tbody>
					</table>
				</div>
				<div class="col-xs-1"></div>
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