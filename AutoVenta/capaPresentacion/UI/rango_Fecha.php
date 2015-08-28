<?php 
	include ('../UIL/Main.php'); 
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
			indice(dg);
		?>
		<div class="container">
			<br/>
			<h1 style="text-align:center">Promedio de Ganancias</h1>
			<br/>
			<div class="row">
				<div class="col-xm-2"></div>
				<div class="col-xm-8" style="text-align:center">
					<img src="Imagen/calendario.jpg" alt="Vista_Ventas" width="400" height="200">
				</div>
				<div class="col-xm-2"></div>
			</div>
			<br/>
			<h4 style="text-align:center">.:. Realizar una consulta de un rango determinado .:. </h4>
			<div class="row">
				<form role="form" class="form-horizontal" target="_black" action="../UIL/manipulacion.php" method="post">
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Fecha de Inicio:</label>
						<div class="col-xs-4">
							<input type="date" class="form-control " name="cf_I" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Hasta la Fecha:</label>
						<div class="col-xs-4">
							<input type="date" class="form-control " name="cf_F" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<center>
					<button type="submit" class="btn btn-success" name="btn_SQL"><span class="glyphicon glyphicon-ok"></span> Consultar</button>
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