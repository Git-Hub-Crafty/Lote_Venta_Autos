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
						$sql_Select = 'SELECT * FROM ventas';
						$res_Select = $conn->query($sql_Select);
						$num_R = $res_Select->num_rows;
						echo '<p>Nu&#769mero de Autos encontrados: '.$num_R.'</p>';
					?>
					<table class="table">
						<thead>
							<tr bgcolor="gray" style="color:black">
								<th>Folio</th>
								<th>Cliente</th>
								<th>Auto</th>
								<th>Fecha de Entrega</th>
								<th>Consultar</th>
							</tr>
						</thead>
						<tbody>
							<?php
								for ($i = 0; $i < $num_R; $i++) {
									$fila = $res_Select->fetch_assoc();
									echo '<tr class="success">';
										echo '<td>'.$fila[folio].'</td>';
										echo '<td>'.$fila[name_Cliente].'</td>';
										echo '<td>'.$fila[marca].'</td>';
										echo '<td>'.$fila[fecha_Entrega].'</td>';
										echo  '<td><a href="cd_Venta.php?btn_Query='.$fila[folio].'">Ver</a></td>';;
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