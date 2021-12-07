<!DOCTYPE html>
<html>
<head>
	<title>page d'accueil de l'hôpital</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php 
	include("include/header.php");
	?>
	<div class="container">
		<div class="col-md-12">
			<div class="row my-5">
				<div class="col-md-1">
					
				</div>
				<div class="col-md-3 mx-3 shadow">
					<img src="img/tazi.jpg" style="width: 100%;">
					<h5 class="text-center">on cherche des nouveau employés</h5>
					<a href="apply.php">
						<button class="btn btn-info my-3" style="margin-left: 30%;">
						Rejoignez-nous
						</button>
					</a>
				</div>
				<div class="col-md-3 mx-3 shadow">
					<img src="img/corona.jpg" style="width: 100%;">
					<h5 class="text-center">la situation épidémiologique au Maroc</h5>
					<a href="https://www.sante.gov.ma/Publications/Pages/Bullten_%C3%89pid%C3%A9miologique.aspx"><button class="btn btn-info my-3" id="bt-i">
						En savoir plus</button></a>
				</div>
				<div class="col-md-3 mx-3 shadow">
					<img src="img/info.jpg" style="width: 100%;">
					<h5 class="text-center">demander des informations</h5>
					<a href="account.php"><button class="btn btn-info my-3" id="bt-i">
						En savoir plus</button></a>
				</div>
				
			</div>
			
		</div>
		
		
	</div>

	<footer class="text-center text-white fixed-bottom bg-light">
		  <div class="container p-4 "></div>
		  <div class="text-center p-3 bg-info">
		    © 2021 Copyright:
		    <a class="text-white" href="index.php">hopitalvi.com</a>
		  </div>
	</footer>

</body>
</html>