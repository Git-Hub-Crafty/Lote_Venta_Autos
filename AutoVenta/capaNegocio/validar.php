<?php 
	session_start();

		include ('../capaDatos/conexion.php');
		$conectar = new conexion();
		$conn = $conectar->enlace();

		#Operador de Resolución de Ámbito (::) 
		#$miclass = 'conexion'; https://www.youtube.com/watch?v=h9Dht7-FAZY
		#$conn = $miclass::enlace();#Esta funcion llamada deve contener 'public static function(){}'
		#-----------------
		#$ Mysqli  =  nueva  mysqli ( 'nombre de host ' ,  'db_username' ,  'contraseña_bd' ,  'nombre_bd' ); 
/*		$ consulta  =  sprintf ( "SELECT * FROM` `de los usuarios DONDE Nombre de usuario = '% s' Y Password='%s'" , 
                  $$mysqli -> real_escape_string ( $Username ), 
                  $$mysqli -> real_escape_string ( $Password )); 
$mysqli -> query ( $query );*/
		#-----------------
		if (isset($_POST['login'])) {
			$usuario = htmlspecialchars($_POST['usuario']);
			$password = htmlspecialchars($_POST['pass']);
			$ssql = sprintf("SELECT * FROM sesion WHERE nSesion='%s' and pass='%s'", $usuario, $password);
			$sql = $conn->query($ssql);
			#$sql = $conn->query("SELECT * FROM sesion WHERE nSesion='$usuario' and pass='$password'");
			$bit = false;
			$val = "'";
			$pos = strpos($password, $val);
			if ($pos === false) {
				$bit = true;
			}

			if(!empty($sql && $bit === true)){
				$fila = $sql->fetch_array();
				if ($fila) {
					$_SESSION['user'] = $_POST['usuario'];
					echo "<script>window.location='../capaPresentacion/UI/principal.php';</script>";
				}else{
					echo '<script>alert("El usuario y/o contrasen&tilde son incorrectos.");</script>';
					echo "<script>window.location='../capaPresentacion/UI/login.php';</script>";
				}
			}else{
				echo '<script>alert("El usuario y/o contraseña son incorrectos.");</script>';
				echo "<script>window.location='../capaPresentacion/UI/login.php';</script>";
			}
		}

	?>