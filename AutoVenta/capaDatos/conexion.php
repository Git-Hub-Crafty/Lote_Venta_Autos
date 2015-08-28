<?php
	class conexion {
		var $server;
		var $user;
		var $pass;
		var $db;
		
		function conexion(){
			$this->server = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->db = "autos_lote";
		}

		function enlace() {
			$link = new mysqli($this->server, $this->user, $this->pass, $this->db) or die("No se estableció la conexión con el servidor");
			if (mysqli_connect_errno()) {
				echo "<script>alert('ERROR: \n ->No se establece la conección con la bese de datos.')</script>";
				exit;
			}
			return $link;
		}

	}	
?>