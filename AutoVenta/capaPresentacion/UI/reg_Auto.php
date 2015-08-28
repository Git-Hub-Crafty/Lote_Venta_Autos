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
			<h1 style="text-align:center">Registrar nuevos datos de Auto</h1>
			<br/>
			<div class="row">
				<div class="col-xm-2"></div>
				<div class="col-xm-8" style="text-align:center">
					<img src="Imagen/vista_Autos.jpg" alt="Vista_Autos" width="500" height="300">
				</div>
				<div class="col-xm-2"></div>
			</div>
			<br/>
			<h4 style="text-align:center">.:. Requisitos .:. </h4>
			<div class="row">
				<form role="form" class="form-horizontal" action="../UIL/manipulacion.php" method="post">
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" >Matricula:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="matricula" placeholder="Matricula.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="name">Marca:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="marca" placeholder="Marca.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="last_name">Modelo:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="modelo" placeholder="Modelo.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="dir">Color:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="color" placeholder="Color.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="tel">Antiguedad:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="antiguedad" placeholder="Ejm.'2010'.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Potencia:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="potencia" placeholder="Potencia.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Velocidad:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="velocidad" placeholder="Velocidad.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
										<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Precio:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="precio" placeholder="Precio.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<center>
					<button type="submit" class="btn btn-success"  name="add_Auto"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
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