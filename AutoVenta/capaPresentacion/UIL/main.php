<?php
	function usuario(){
		session_start();
		if (isset($_SESSION['user'])) {
			return 1;
		}else{
			$script = '<script>';
			$script .= 'alert("Es requerido iniciar sesión con una cuenta de usuario.");';
			$script .= 'window.location = "login.php";';
			$script .= '</script>';
			echo $script;
		}
	}

	function cabecera() {
?>
		<meta charset = "utf-8">
		<meta name = "viewport" content = "width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=EDGE" />
		<!--Icono de la ventana-->
		<link rel = "shortcurt icon" type = "image/icon" href = "../UI/Imagen/venta_auto.jpg">

		<title>Venta de Vehículos</title>
		<!--Llamando elementos Bootstrap-->
		<link rel = "stylesheet" href = "../UIL/css/bootstrap.min.css">
		<script src = "../UIL/js/jquery.min.js"></script>
		<script src = "../UIL/js/bootstrap.min.js"></script>
		
<?php
	}

	function indice() {
?>
		<nav class="navbar navbar-inverse">
			<div class = "container-fluid">
			<div class = "navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#content-sidebar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
				</button>
				<img src="../UI/Imagen/venta_auto.jpg"><!--<a class = "navbar-brand" >Cars-Movil</a>-->
			</div>
			<div class="collapse navbar-collapse"id="content-sidebar">
				<ul class="nav navbar-nav" >
					<li class="active"><a href="Principal.php">Home</a></li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="badge">1</span> Automo&#769viles <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">.:. Opciones .:.</li>
							<li><a href="reg_Auto.php">Registrar</a></li>
							<li><a href="cg_Autos.php">Consultar</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="badge">2</span> Clientes <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">.:. Opciones .:.</li>
							<li><a href="reg_Cliente.php">Registrar</a></li>
							<li><a href="cg_Clientes.php">Consultar</a></li>
						</ul>
					</li> 
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><span class="badge">3</span> Empleados <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">.:. Opciones .:.</li>
							<li><a href="reg_Empleado.php">Registrar</a></li>
							<li><a href="cg_Empleados.php">Consultar</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="badge">4</span> Ventas <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">.:. Opciones .:.</li>
							<li><a href="reg_Venta.php">Registrar</a></li>
							<li><a href="cg_Ventas.php">Consultar</a></li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><span class="badge">5</span> Reportes <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="dropdown-header">.:. Opciones .:.</li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=AMG" target="_blank">Auto de mayor ganancia</a></li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=AMV" target="_blank">Auto más vendido</a></li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=EMV" target="_blank">Empleado de mayor ventas</a></li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=CMC" target="_blank">Cliente de Mayor compra</a></li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=CMI" target="_blank">Cliente de mayor ingresos</a></li>
							<li><a href="rango_Fecha.php">Promedio de ganancia M-A</a></li>
							<li><a href="../UIL/reportes/reporte_PDF.php?nSql=VFV" target="_blank">Fecha de ventas</a></li>
							</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
					<li><a href="../UIL/logout.php"><span class="glyphicon glyphicon-log-in"></span>Logout</a></li>
				</ul>
			</div>
			</div>
		</nav>
		<div class="progress">
				<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar"
				aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%">
				</div>
			</div>
<?php
	}

	function piepagina(){
?>
		<div style="background: black">
			<FONT SIZE="-1" >
				<h6 style="color:lightblue; text-align:center">.:. Autor: Ing. Omar Herna&#769ndez Avellaneda .:.</h6>
			</FONT>
		</div>
<?php
	}

