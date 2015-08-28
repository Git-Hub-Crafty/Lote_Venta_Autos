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
			<h1 style="text-align:center">Registrar nuevo datos de Venta</h1>
			<br/>
			<div class="row">
				<div class="col-xm-2"></div>
				<div class="col-xm-8" style="text-align:center">
					<img src="Imagen/vista_Ventas.jpg" alt="Vista_Ventas" width="400" height="200">
				</div>
				<div class="col-xm-2"></div>
			</div>
			<br/>
			<?php
				require ('../../capaDatos/conexion.php');
				$fl = $_GET[btn_Edit];
				$conecta = new conexion();
				$conn = $conecta->enlace();
				$sql_Select = "SELECT * FROM ventas WHERE folio = ". $fl;
				$res_Select = $conn->query($sql_Select);
				$Array = $res_Select->fetch_array();
			?>
			<h4 style="text-align:center">.:. Requisitos .:. </h4>
			<div class="row">
				<form role="form" class="form-horizontal" action="../UIL/manipulacion.php" method="post">
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" >Clave de Cliente:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="cvCliente" value="<?php echo $Array[cv_Cliente]; ?>" 
							placeholder="Clave.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" >IFE de Empleado:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="cvEmpleado" value="<?php echo $Array[cv_Empleado]; ?>" 
							placeholder="Ejm.'HEAO901014'" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="last_name">Matricula de Auto:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="matricula" value="<?php echo $Array[cv_Auto]; ?>" 
							placeholder="Matricula.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="dir">Descripción:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="descripcion" value="<?php echo $Array[descripcion]; ?>" 
							placeholder="Descripción.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="tel">Precio:</label>
						<div class="col-xs-4">
							<input type="text" class="form-control " name="precio" value="<?php echo $Array[precio]; ?>" 
							placeholder="Precio.." autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<div class="col-xm-2"></div>
					</div>
					<div class="form-group has-success has-feedback">
						<div class="col-xm-2"></div>
						<label class="control-label col-xs-4" for="cd">Fecha de Entrega:</label>
						<div class="col-xs-4">
							<input type="date" class="form-control " name="fecha_E" value="<?php echo $Array[fecha_Entrega]; ?>" autocomplete="off" required="true" >
							<span class="glyphicon glyphicon-ok form-control-feedback"></span>
						</div>
						<input type="hidden" class="form-control " name="folio" value="<?php echo $Array[folio]; ?>" >
						<div class="col-xm-2"></div>
					</div>
					<center>
					<button type="submit" class="btn btn-success"  name="act_Venta"><span class="glyphicon glyphicon-ok"></span> Registrar</button>
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