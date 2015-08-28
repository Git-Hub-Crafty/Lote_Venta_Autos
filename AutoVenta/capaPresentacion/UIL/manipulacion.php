<?php
	require ('../../capaNegocio/transaccion.php');

	$objTransaccion = new transaccion();

	#Metodos(Funciones) de resultado.
		function accede($ruta) {?>
			<script>
				alert('El registro fue .:.¡Exitoso!.:.');
				var url = "../../capaPresentacion/UI/" + "<?php echo $ruta; ?>";
				location.href = url;
			</script><?php
		}
		function denegar($ruta) {?>
			<script>
				alert('El registro fue :.:¡No Exitoso!:.:');
				var url = "../../capaPresentacion/UI/" + "<?php echo $ruta; ?>";
				location.href = url;
			</script><?php
		}
	#Push of buttom Autos.**********
		if (isset($_POST[add_Auto])) {
			$inserting = $objTransaccion->reg_Auto($_POST[matricula], $_POST[marca], $_POST[modelo], 
										$_POST[color],$_POST[antiguedad], $_POST[potencia], $_POST[velocidad],
										$_POST[precio]);
			if ($inserting) {
				accede('cg_Autos.php');
			}else{
				denegar('reg_Auto.php');
			}
		}
		if (isset($_POST[act_Auto])) {
			$Updating = $objTransaccion->update_Auto($_POST[matricula], $_POST[marca], $_POST[modelo],
										$_POST[color], $_POST[antiguedad], $_POST[potencia], $_POST[velocidad],
										$_POST[precio]);
			if ($Updating) {
				accede("cd_Auto.php?btn_Query=$_POST[matricula]");
			}else{
				denegar("cd_Auto.php?btn_Query=$_POST[matricula]");
			}
		}
		if (!empty($_GET[del_Auto])) {
			$Deleting = $objTransaccion->delete_Auto($_GET[del_Auto]);
			if ($Deleting) {
				accede('cg_Autos.php');
			}else{
				denegar("cd_Auto.php?btn_Query=$_GET[del_Auto]");
			}
		}
	#Push of buttom Empleados.***********
		if (isset($_POST['add_Empleado'])) {
			$Inserting = $objTransaccion->reg_Empleado($_POST['ife'], $_POST['nombre'], $_POST['apellido'], 
										$_POST['direccion'], $_POST['telefono'], $_POST['ciudad']);
			if ($Inserting) {
				accede('cg_Empleados.php');
			}else{
				denegar('reg_Empleado.php');
			}
		}
		if (isset($_POST['act_Empleado'])) {
			$Updating = $objTransaccion->update_Empleado($_POST['ife'], $_POST['nombre'], $_POST['apellido'], 
										$_POST['direccion'], $_POST['telefono'], $_POST['ciudad']);
			if ($Updating) {
				accede("cd_Empleado.php?btn_Query=$_POST[ife]");
			}else{
				denegr('cd_Empleado.php?btn_Query=$_POST[ife]');
			}
		}
		if (!empty($_GET['del_Empleado'])) {
			$Deleting = $objTransaccion->delete_Empleado($_GET['del_Empleado']);
			if ($Deleting){
				accede('cg_Empleados.php');
			}else{
				denegar("cd_Empleado.php?btn_Query=$GET[del_Empleado]");
			}
		}
	#Push of buttom Clientes.**********
		if (isset($_POST['add_Cliente'])) {
			$Inserting = $objTransaccion->reg_Cliente($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], 
										$_POST['telefono'], $_POST['ciudad']);
			if ($Inserting) {
				accede('cg_Clientes.php');
			}else{
				denegar('reg_Cliente.php');
			}
		}
		if (isset($_POST['act_Cliente'])) {
			$Updating = $objTransaccion->update_Cliente($_POST['nombre'], $_POST['apellido'], $_POST['direccion'], 
										$_POST['telefono'], $_POST['ciudad'],$_POST['clave']);
			if ($Updating) {
				accede("cd_Cliente.php?btn_Query=$_POST[clave]");
			}else{
				denegar("cd_Cliente.php?btn_Query=$_POST[clave]");
			}
		}
		if (!empty($_GET['del_Cliente'])) {
			$Deleting = $objTransaccion->delete_Cliente($_GET['del_Cliente']);
			if ($Deleting) {
				accede('cg_Clientes.php');
			}else{
				denegar("cd_Cliente.php?btn_Query=$_GET[del_Cliente]");
			}
		}
	#Push of buttom Ventas.**********
		if (isset($_POST[add_Venta])) {
			$Inserting = $objTransaccion->reg_Venta($_POST[cvCliente], $_POST[cvEmpleado], $_POST[matricula], 
										$_POST[descripcion], $_POST[precio], $_POST[fecha_E]);
			if ($Inserting) {
				accede('cg_Ventas.php');
			}else{
				denegar('reg_Venta.php');
			}
		}
		if (isset($_POST[act_Venta])){
			$Updating = $objTransaccion->update_Venta($_POST[cvCliente], $_POST[cvEmpleado], $_POST[matricula], 
										$_POST[descripcion], $_POST[precio], $_POST[fecha_E], $_POST[folio]);
			if ($Updating){
				accede("cd_Venta.php?btn_Query=$_POST[folio]");
			}else{
				denegar("cd_Venta.php?btn_Query=$_POST[folio]");
			}
		}
		if (!empty($_GET[del_Venta])) {
			$Deleting = $objTransaccion->delete_Venta($_GET[del_Venta]);
			if ($Deleting) {
				accede('cg_Ventas.php');
			}else{
				denegar("cd_Venta.php?btn_Query=$_GET[del_Venta]");
			}
		}

		if (isset($_POST[btn_SQL])) {
			$fecha_I = $_POST[cf_I];
			$fecha_F = $_POST[cf_F];
			?>
			<script>
				alert("correcta: ");
				var fi= "<?php echo $fecha_I; ?>";
				var ff= "<?php echo $fecha_F; ?>";
				location.href = ("../UIL/reportes/reporte_PDF.php?nSql=VPG&ini="+fi+"&fin="+ff);
			</script>
			<?php	/*$script ='<script>';
			$script .='var start, end;';
			$script .= 'start=prompt("Ingrese la fecha de inicio (Año-Més-Día):","");';
			$script .= 'end=prompt("Ingrese la fecha de fin Año-Més-Día:","");';
			$script .='</script>';
			echo $script;
				//window.open("reportes/reporte_PDF.php?nSql=VPG&date=" + nombre, '_black');
				//location.href = ("../UIL/reportes/reporte_PDF.php?nSql=VPG&date=" + nombre);
					$date_I = "<script> document.write(start)</script>";
					$date_f = "<script> document.write(end)</script>";

					// Los delimitadores pueden ser barra, punto o guión
					
					$bit = 0;
					$val = "-";
					$pos = strpos($password, $val);
					if ($pos === true) {
						$bit = 1;
					}
					*/
					    
					/*}else{
					    echo '<script>
					    		alert("La fecha no es correcta: " + start);
					    		location.href = "../UI/principal.php";</script>';*/
		}