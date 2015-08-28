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
			<br/>
			<h1 style='text-align:center;'>Actualizar registro de cliente.</h1>
			<br/>
			<div class="row">
				<div class="col-xs-2"></div>
				<div class="col-xs-8" style="text-align:center">
					<img src="Imagen/vista_Clientes.jpg" alt="Vista_Clientes" width="370" height="250">
				</div>
				<div class="col-xs-2"></div>
			</div>
			<br>
			<?php 
				require ('../../capaDatos/conexion.php');
				$cv = $_GET['btn_Edit'];
				$conexion = new conexion();
				$conn = $conexion->enlace();
				$sql_Select = "SELECT * FROM clientes WHERE clave='".$cv."'";
				$num_R = $conn->query($sql_Select);
				$miFila = $num_R->fetch_array();
			?>
			<div class="row"></div>
				<form role="form" class="form-horizontal" action="../UIL/manipulacion.php" method="post">
					<div class="form-group has-success has-feedback">
						<div class="col-xs-2"></div>
						<label class="control-label col-xs-4" for="name">Nombre:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="nombre" value="<?php echo $miFila['nombre']; ?>" 
							placeholder="Nombre.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xs-2"></div>
						<label class="control-label col-xs-4" for="last_name">Apellido:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="apellido" value="<?php echo $miFila['apellido']; ?>" 
							placeholder="Apellido.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xs-2"></div>
						<label class="control-label col-xs-4" for="dir">Dirección:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="direccion" value="<?php echo $miFila['direccion']; ?>" 
							placeholder="Dirección.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xs-2"></div>
						<label class="control-label col-xs-4" for="tel">Teléfono:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="telefono" value="<?php echo $miFila['telefono']; ?>" 
							placeholder="Teléfono" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xs-2"></div>
						<label class="control-label col-xs-4" for="cd">Ciudad:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="ciudad" value="<?php echo $miFila['ciudad']; ?>" 
							placeholder="Ciudad.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<input type="hidden" class="form-control " name="clave" value="<?php echo $miFila['clave']; ?>" >
						<div class="col-xs-2"></div>
					</div>
					<center>
					<button type="submit" class="btn btn-success"  name="act_Cliente"><span class="glyphicon glyphicon-ok"></span> Actualizar</button>
					</center>
				</form>
			</div>
			<br/>
		</div>
		<?php 
			PiePagina();
		?>
		</body>
</html>
<?php
	}
?>