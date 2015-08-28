<?php
	session_start();
	if(isset($_SESSION['user'])){
	echo '<script>alert("Podra acceder a esta página crrando sesión actual.")</script>';
	echo '<script> window.location="principal.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Inicio de sesion</title>
<script language="javascript" src="../UIL/js/jquery.min.js" type="text/javascript"> </script>
<style>
	#sesion{
		background-image:url(Imagen/login-tech.jpg);
	}
	/*Capa de movimiento*/
	#scapaformulario2{
		position:absolute;
		margin-top:240px;
		margin-left:455px;
		width: 420px;
		height: 265px;/*
		background: url(../Imagen/sesion.png);*/
		padding-left: 15px;
		color: white;
		border-style:double;
	}
</style>
<script>
	$(document).ready(
	function(){
			$("#scapaformulario2").hide();
			$("#scapaformulario2").show(3000);	
		}
		);
</script>

</head>
<body id="sesion">
<?php    
	echo '<div id="scapaformulario2">';
	echo '<p style="color:lime; text-align:right; border:1px solid white;">Ingrese los datos solicitados</p>';
    echo '<form action="../../capaNegocio/validar.php" method="post">';
    echo 'Nombre:<br/><input type="text" name="usuario" size="30px;"/><br/>';
    echo 'Password:<br/><input type="password" name="pass" /><br/>';
    echo '<br><br>'
		.'<input type="submit" name="login"  value="Entrar" />'
        .'</form>'
    	.'</div>';
?>
</body>
</html>