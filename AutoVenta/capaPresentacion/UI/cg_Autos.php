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
						$sql_Select = 'SELECT * FROM autos';
						$res_Select = $conn->query($sql_Select);
						$num_R = $res_Select->num_rows;
						echo '<p>Nu&#769mero de Autos encontrados: '.$num_R.'</p>';
					?>
					<table class="table">
						<thead>
							<tr bgcolor="gray" style="color:black">
								<th>Matricula</th>
								<th>Marca</th>
								<th>Color</th>
								<th>Velocidad</th>
								<th>Consultar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i = 0; $i < $num_R; $i++) {
									$fila = $res_Select->fetch_assoc();
									echo '<tr class="success">';
										echo '<td>'.$fila[matricula].'</td>';
										echo '<td>'.$fila[marca].'</td>';
										echo '<td>'.$fila[color].'</td>';
										echo '<td>'.$fila[velocidad].'</td>';
										echo  '<td><a href="cd_Auto.php?btn_Query='.$fila[matricula].'">Ver</a></td>';;
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