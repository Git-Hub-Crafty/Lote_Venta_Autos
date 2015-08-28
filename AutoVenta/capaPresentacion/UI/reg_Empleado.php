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
			<h1 style="text-align:center">Registrar nuevos datos de empleado</h1>
			<br/>
			<div class="row">
				<div class="col-xm-2"></div>
				<div class="col-xm-8" style="text-align:center">
					<img src="Imagen/vista_Empleados.jpg" alt="Vista_Empleados" width="400" height="150">
				</div>
				<div class="col-xm-2"></div>
			</div>
			<br/>
			<h4 style="text-align:center">.:. Requisitos .:. </h4>
			<div class="row">
				<form role="form" class="form-horizontal" action="../UIL/manipulacion.php" method="post">
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" >IFE:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="ife" placeholder="Ejm:'HEAO901014'" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="name">Nombre:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="nombre" placeholder="Nombre.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="last_name">Apellido:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="apellido" placeholder="Apellido.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="dir">Dirección:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="direccion" placeholder="Dirección.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="tel">Teléfono:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="telefono" placeholder="Teléfono" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Ciudad:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="ciudad" placeholder="Ciudad.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<center>
					<button type="submit" class="btn btn-success"  name="add_Empleado"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
					</center>
				</form>
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