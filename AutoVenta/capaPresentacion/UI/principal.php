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
	<style>
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
				width: 70%;
				margin: auto;
				}
	</style>
	

</head>
<body style="background-color:lightblue">
	<?php 
		indice();
	?>
	<h1 style="text-align:center">Que esperas! que tu auto te espera.</h1>
	<br/>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<div class="item active">
						<img src="Imagen/nissan-juke.jpg" alt="Chania" width="460" height="345">
						<div class="carousel-caption">
							<h3>Juke</h3>
							<p>El auto fue fabricado en la compañia de la marca Nissan.</p>
						</div>
					</div>
					<div class="item">
						<img src="Imagen/chevrolet-malibu.jpg" alt="Chania" width="460" height="345">
						<div class="carousel-caption">
							<h3>Malibu</h3>
							<p>El auto fue fabricado en la compañia de la marca Chevrolet.</p>
						</div>
					</div>
					<div class="item">
						<img src="Imagen/BMW-X5.jpg" alt="Flower" width="460" height="345">
						<div class="carousel-caption">
							<h3>X5</h3>
							<p>El auto fue fabricado en la compañia de la marca BMW.</p>
						</div>
					</div>
					<div class="item">
						<img src="Imagen/pick-up-toyota.jpg" alt="Flower" width="460" height="345">
						<div class="carousel-caption">
							<h3>Toyota</h3>
							<p>El auto fue fabricado en la compañia de la marca Pick-up.</p>
						</div>
					</div>
				</div>
				<!-- Left and right controls -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
	<br/>
	<?php 
		piepagina();
	?>
</body>
</html>
<?php
	}
