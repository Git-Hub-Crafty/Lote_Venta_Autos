<?php
	require ('../../capaDatos/Conexion.php');
	class transaccion {
		public $conexion;
		public $conn;
	# 0:: Constructor que se ejecuta al momento de crear el objeto.
		function transaccion(){
			$this->conexion = new conexion();
			$this->conn = $this->conexion->enlace();
		}
	# 1:: Autos.
		# 1.1:: Registrar un nuevo dato de Auto.
		function reg_Auto($mtl, $mar, $mod, $col, $ant, $pot, $vel, $pre) {
			$bit = false;
			$existe = $this->query_Registro('autos','matricula',$mtl);
			if ($existe) {
				echo "<script>alert('La clave para el Empleado ya se encuentra registrada, intente de nuevo.');</script>";
			}else{
				$sql_add = "INSERT INTO autos (matricula, marca, modelo, color, antiguedad, potencia, velocidad, precio)" .
							"VALUES ('".$mtl."', '".$mar."', '".$mod."', '".$col."', '".$ant."', '".$pot."', '".$vel."', '".$pre."')";
				$res_add = $this->conn->query($sql_add);		
				if ($res_add) {
					$bit = true;
				}
			}
			return $bit;
			$this->conn->close();
		}
		# 1.1:: Actualizar un dato de Auto.
		function update_Auto($mtl, $mar, $mod, $col, $ant, $pot, $vel, $pre) {
			$bit = 0;
			$sql_Update = "UPDATE autos SET marca='".$mar."', modelo='".$mod."', color='".$col."', antiguedad='".$ant."', potencia='".$pot."'," .
							" velocidad='".$vel."', precio='".$pre."' WHERE matricula='".$mtl."'";
			$res_Update = $this->conn->query($sql_Update);
			if ($res_Update) {
				$bit = 1;
			}
			return $bit;
			$this->conn->close();
		}
		# 1.1:: Elminar un dato de Auto.
		function delete_Auto($mtl) {
			if ($this->dato_Delete('autos', 'matricula', $mtl)) {
				return true;
			}else{
				return false;
			}
		}
	# 2:: Empleados.
		# 2.1:: Registrar un nuevo dato de empleado.
		function reg_Empleado($ife, $name, $apellido, $dir, $tel, $ciudad) {
			$bit = false;
			$existe = $this->query_Registro('empleados', 'ife', $ife);
			if ($existe) {
				echo "<script>alert('La clave para el Empleado ya se encuentra registrada, intente de nuevo.');</script>";
			}else{
				$sql_Reg = 'INSERT INTO empleados (IFE, nombre, apellido, direccion, telefono, ciudad)' .
							'VALUES ("'.$ife.'", "'.$name.'", "'.$apellido.'", "'.$dir.'", "'.$tel.'", "'.$ciudad.'")';
				$sql_Res = $this->conn->query($sql_Reg);
				if ($sql_Res) {
					$bit = true;
				}
			}
			return $bit;
			$this->conn->close();
		}
		# 2.2:: Actualizar el dato de empleado.
		function update_Empleado($ife, $name, $apellido, $dir, $tel, $ciudad) {
			$bit = 0;
			$sql_Update = "UPDATE empleados SET nombre='".$name."', apellido='".$apellido."', direccion='".$dir."', telefono='".$tel."', 
							ciudad='".$ciudad."' WHERE IFE='".$ife."'";
			$res_Update = $this->conn->query($sql_Update);
			if ($res_Update) {
				$bit = 1;
			}
			return $bit;
			$this->conn->close();
		}
		# 2.3:: Eliminar un dato de empleado.
		function delete_Empleado($ife) {
			if ($this->dato_Delete('empleados', 'IFE', $ife)) {
				return true;
			}else{
				return false;
			}
		}
	# 3:: Clientes.
		# 3.1 :: Método(función) para almacenar un registro de clilente.
		function reg_Cliente($name, $apellido, $dir, $tel, $ciudad) {
			$As = false;
			$sql_Insert = "INSERT INTO clientes (nombre, apellido, direccion, telefono, ciudad) ";
			$sql_Insert .= "VALUES ('".$name."', '".$apellido."', '".$dir."', '".$tel."', '".$ciudad."')";
			$res = $this->conn->query($sql_Insert);
			if ($res){ 
				$As = true;
			}
			return $As;
			$this->conn->close();
		}
		# 3.2:: Método para actualizar un cliente indicado.
		function update_Cliente($name, $apellido, $dir, $tel, $ciudad, $cv) {
			$bol = false;
			$sql_Update = "UPDATE clientes SET nombre='".$name."', apellido='".$apellido."', direccion='".$dir."', telefono='".$tel."', 
							ciudad='".$ciudad."' WHERE clave='".$cv."'";
			$res_Update = $this->conn->query($sql_Update);
			if ($res_Update) {
				$bol = true;
			}
			return $bol;
			$this->conn->close();
		}
		# 3.3:: Método para la eliminación de un dato.
		function delete_Cliente($cv) {
			if ($this->dato_Delete('clientes', 'clave', $cv)) {
				return true;
			}else{
				return false;
			}
		}
	# 4:: Ventas.
		# 4.1:: Registrar un nuevo dato de venta.
		function reg_Venta($cvC, $cvE, $mtl, $des, $pre, $fE) {
			$bit = 0;
			$existe_Cliente = $this->query_Registro('clientes', 'clave', $cvC);
			$existe_Empleado = $this->query_Registro('empleados','IFE', $cvE);
			$existe_Auto = $this->query_Registro('autos','matricula', $mtl);
			if ($existe_Cliente) {
				if ($existe_Empleado) {
					if ($existe_Auto) {
						$sql_add = "INSERT INTO ventas " 
									."(cv_Cliente, name_Cliente, cv_Empleado, name_Empleado, cv_Auto, marca, descripcion, precio, "
									."fecha_Venta, fecha_Entrega) VALUES ('".$cvC."', '".$existe_Cliente['nombre']."', "
									." '".$cvE."', '".$existe_Empleado['nombre']."', '".$mtl."', '".$existe_Auto['marca']."', "
									." '".$des."', '".$pre."', '".date('y/m/d')."', '".$fE."')";
						$res_add = $this->conn->query($sql_add);
						if ($res_add) {
							$bit = 1;
						}
					}else{
						echo "<script>alert('La matricula de {Auto} no existe en la base de datos, ingrese uno activo.');</script>";
					}
				}else{
					echo "<script>alert('El IFE de {Empleado} no existe en la base de datos, ingrese uno activo.');</script>";
				}
			}else{
				echo "<script>alert('La clave de {Cliente} no existe en la base de datos, ingrese uno activo.');</script>";
			}
			return $bit;
			$this->conn->close();
		}
		# 4.1:: Actualizar un dato de venta.
		function update_Venta($cvC, $cvE, $mtl, $des, $pre, $fE, $fl) {
			$bit = 0;
			$existe_Cliente = $this->query_Registro('clientes', 'clave', $cvC);
			$existe_Empleado = $this->query_Registro('empleados','IFE', $cvE);
			$existe_Auto = $this->query_Registro('autos','matricula', $mtl);
			if ($existe_Cliente) {
				if ($existe_Empleado) {
					if ($existe_Auto) {
						$sql_Update = " UPDATE ventas SET " .
									"cv_Cliente='".$cvC."', name_Cliente='".$existe_Cliente['nombre']."', cv_Empleado='".$cvE."', " . 
									" name_Empleado='".$existe_Empleado['nombre']."', cv_Auto='".$mtl."', " .
									"marca='".$existe_Auto['marca']."', descripcion='".$des."', precio='".$pre."', " .
									" fecha_Venta='".date('y/m/d')."', fecha_Entrega='".$fE."' WHERE folio='".$fl."'";
						$res_Update = $this->conn->query($sql_Update);
						if ($res_Update) {
							$bit = 1;
						}
					}else{
						echo "<script>alert('La matricula de {Auto} no existe en la base de datos, ingrese uno activo.');</script>";
					}
				}else{
					echo "<script>alert('El IFE de {Empleado} no existe en la base de datos, ingrese uno activo.');</script>";
				}
			}else{
				echo "<script>alert('La clave de {Cliente} no existe en la base de datos, ingrese uno activo.');</script>";
			}
			return $bit;
			$this->conn->close();
		}
		# 4.1:: Eliminar un dato de venta.
		function delete_Venta($fl) {
			if ($this->dato_Delete('ventas', 'folio', $fl)) {
				return true;
			}else{
				return false;
			}
		}
	# I:: Borrar registros de las tablas.
		function dato_Delete($tbl, $field, $dat) {
			$like = false;
			$sql_Delete = "DELETE FROM ".$tbl." WHERE ".$field."='".$dat."'";
			$res_Delete = $this->conn->query($sql_Delete);
			if ($res_Delete) {
				$like = true;
			}
			return $like;
			$this->conn->close();
		}
	# II:: Busqueda General de Registros.
		#Buscar un registro existente.
		function query_Registro($table, $field, $val) {
			$sql_Select = "SELECT * FROM " .$table. " WHERE " . $field. " = '" .$val. "'";
			$res = $this->conn->query($sql_Select);
			$exist = mysqli_fetch_array($res);
			return $exist;
			$this->conn->close();
		}
}