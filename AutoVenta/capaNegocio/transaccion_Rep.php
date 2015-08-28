<?php 
	require ('../../../capaDatos/Conexion.php');
	class transaccion {
		public $conexion;
		public $conn;
	# 0:: Constructor que se ejecuta al momento de crear el objeto.
		function transaccion(){
			$this->conexion = new conexion();
			$this->conn = $this->conexion->enlace();
		}
	#III:: Reportes
		function ssql_Rep_PDF($num_sql){
			$html="";
			$sql = "";
			if ($num_sql === 'AMG') {
				$sql="SELECT autos.matricula, autos.marca, MAX(autos.precio) As Resultado FROM autos";
				$html .= $this->auto_MasG_PDF($sql);
			}
			if ($num_sql === 'AMV') {
				$sql="SELECT ventas.cv_Auto As Auto, ventas.marca As Marca, Sum(1) AS Venta FROM ventas group by ventas.cv_Auto";
				$html .= $this->auto_MasV_PDF($sql);
			}
			if ($num_sql === 'EMV') {
				$sql="SELECT ventas.cv_Empleado As IFE, ventas.name_Empleado As Nombre, SUM(1) As Venta FROM ventas group by ventas.cv_Empleado";
				$html .= $this->empleado_MasV_PDF($sql);
			}
			if ($num_sql === 'CMC') {
				$sql="SELECT ventas.cv_Cliente As Clave, ventas.name_Cliente As Nombre, Sum(1) AS Compras FROM ventas group by ventas.cv_Cliente";
				$html .= $this->cliente_MasC_PDF($sql);
			}
			if ($num_sql === 'CMI') {
				$sql="SELECT ventas.cv_Cliente As Clave, ventas.name_Cliente As Nombre, MAX(ventas.precio) As Compras, SUM(1) FROM ventas order by ventas.precio DESC";
				$html .= $this->cliente_MasI_PDF($sql);
			}
			if ($num_sql === 'VPG') {
				$sql="SELECT ventas.folio, ventas.fecha_Venta As Venta, ventas.fecha_Entrega As Entrega, 
				AVG(ventas.precio) AS Ganancia FROM ventas  WHERE ventas.fecha_Venta BETWEEN '".$_GET[ini]."' AND '".$_GET[fin]."'";
				$html .= $this->venta_ProG_PDF($sql);
			}
			if ($num_sql === 'VFV') {
				$sql="SELECT folio, ventas.cv_Auto AS Auto, marca, ventas.fecha_Venta AS Venta, fecha_Entrega As Entrega FROM ventas";
				$html .= $this->venta_FecV_PDF($sql);
			}
			return ($html);
		}

		function auto_MasG_PDF($sql){			
			$i=0;
			$rs=$this->conn->query($sql);
			$html=$html.'<div align="center">
						<h1>Reporte del Automóvil</h1>
						<h3>Opteniendo el auto de mayor ganancía.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Matricula</font></td>
							<td><font color="#FFFFFF">Marca</font></td>
							<td><font color="#FFFFFF">Precio</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[matricula];
				$html = $html.'</td><td>';
				$html = $html. $row[marca];
				$html = $html.'</td><td>';
				$html = $html. $row[Resultado];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		return ($html);
     		$this->conn->close();
		}
		function auto_MasV_PDF($sql){			
			$i=0;
			$rs=$this->conn->query($sql);
			$html=$html.'<div align="center">
						<h1>Reporte de Automóvil.</h1>
						<h3>Opteniendo el auto más vendido.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Auto más vendido</font></td>
							<td><font color="#FFFFFF">Modelo</font></td>
							<td><font color="#FFFFFF">Ventas</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row["Auto"];
				$html = $html.'</td><td>';
				$html = $html. $row["Marca"];
				$html = $html.'</td><td>';
				$html = $html. $row["Venta"];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		return ($html);
     		$this->conn->close();
		}
		function empleado_MasV_PDF($sql){
			$rs=$this->conn->query($sql);
			$i=0;
			$html=$html.'<div align="center">
						<h1>Reporte de Emmpleado.</h1>
						<h3>Opteniendo el registro del empleado de mayor ventas.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">IFE</font></td>
							<td><font color="#FFFFFF">Nombre</font></td>
							<td><font color="#FFFFFF">Ventas</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[IFE];
				$html = $html.'</td><td>';
				$html = $html. $row[Nombre];
				$html = $html.'</td><td>';
				$html = $html. $row[Venta];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		return ($html);
			$this->conn->close();
		}
		function cliente_MasC_PDF($sql){
			$html="";
			$rs=$this->conn->query($sql);
			$i=0;
			$html=$html.'<div align="center">
						<h1>Reporte de Cliente.</h1>
						<h3>Opteniendo el cliente de más compras realizadas.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Clave</font></td>
							<td><font color="#FFFFFF">Nombre</font></td>
							<td><font color="#FFFFFF">Compras</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[Clave];
				$html = $html.'</td><td>';
				$html = $html. $row[Nombre];
				$html = $html.'</td><td>';
				$html = $html. $row[Compras];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		function cliente_MasI_PDF($sql){
			$html="";
			$rs=$this->conn->query($sql);
			$i=0;
			$html=$html.'<div align="center">
						<h1>Reporte de Cliente.</h1>
						<h3>Opteniendo el cliente con el mejor ingreso.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Clave</font></td>
							<td><font color="#FFFFFF">Nombre</font></td>
							<td><font color="#FFFFFF">Compra</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[Clave];
				$html = $html.'</td><td>';
				$html = $html. $row[Nombre];
				$html = $html.'</td><td>';
				$html = $html. $row[Compras];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		function venta_ProG_PDF($sql){
			$html="";
			$rs=$this->conn->query($sql);
			$i=0;
			$html=$html.'<div align="center">
						<h1>Reporte de Ventas.</h1>
						<h3>Opteniendo el promedio de ganacía del més o año.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Folio</font></td>
							<td><font color="#FFFFFF">Venta</font></td>
							<td><font color="#FFFFFF">Entrega</font></td>
							<td><font color="#FFFFFF">Promedio de ganancía</font></td>
							<td><font color="#FFFFFF">Rango de Fecha</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[folio];
				$html = $html.'</td><td>';
				$html = $html. $row[Venta];
				$html = $html.'</td><td>';
				$html = $html. $row[Entrega];
				$html = $html.'</td><td>';
				$html = $html. (float) $row[Ganancia];
				$html = $html.'</td><td>';
				$html = $html. ''.$_GET[ini]." - ".$_GET[fin].'';
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}
		function venta_FecV_PDF($sql){
			$html="";
			$rs=$this->conn->query($sql);
			$i=0;
			$html=$html.'<div align="center">
						<h1>Reporte de Ventas.</h1>
						<h3>Opteniendo la fecha en de venta de los Automóviles.</h3>
						<br /><br />			
						<table border="0" bordercolor="#0000CC" bordercolordark="#FF0000">';	
			$html=$html.'<tr bgcolor="#FF0000">
							<td><font color="#FFFFFF">Folio</font></td>
							<td><font color="#FFFFFF">Auto</font></td>
							<td><font color="#FFFFFF">Marca</font></td>
							<td><font color="#FFFFFF">Fecha de Venta</font></td>
							<td><font color="#FFFFFF">Fecha de Entrega</font></td></tr>';
			while ($row = $rs->fetch_array()){
				if($i%2==0){
					$html=  $html.'<tr bgcolor="#95B1CE">';
				}else{
					$html=$html.'<tr>';
				}
				$html = $html.'<td>';
				$html = $html. $row[folio];
				$html = $html.'</td><td>';
				$html = $html. $row[Auto];
				$html = $html.'</td><td>';
				$html = $html. $row[marca];
				$html = $html.'</td><td>';
				$html = $html. $row[Venta];
				$html = $html.'</td><td>';
				$html = $html. $row[Entrega];
				$html = $html.'</td></tr>';		
				$i++;
			}			
			$html=$html.'</table></div>';			
     		 return ($html);
		}

}
?>