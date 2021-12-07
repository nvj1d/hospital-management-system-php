<!DOCTYPE html>
<html>
<head>
	<title></title>
		
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	
	<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-info bg-info" style="height: 70px;">
		<h2 class="navbar-brand text-white" id="head_c"><a href="/hospital/index.php"><img src="/hospital/img/logo1.png" style="margin-top:7px;width: 150px"></a></h2>
		<div class="mr-auto"></div>
		<ul class="navbar-nav">
			<?php 
				if (isset($_SESSION['admin'])) {
					$user = $_SESSION['admin'];
					echo '
						<li class="nav-item"><a href="/hospital/admin/profile.php" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Se déconnecter</a></li>
						';

				}else if (isset($_SESSION['patient'])) {
					$user = $_SESSION['patient'];
					echo '
						<li class="nav-item"><a href="/hospital/patient/profile.php" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Se déconnecter</a></li>
						';

				} else if(isset($_SESSION['doctor'])){
					$user = $_SESSION['doctor'];
					echo '
						<li class="nav-item"><a href="/hospital/doctor/profile.php" class="nav-link text-white">'.$user.'</a></li>
						<li class="nav-item"><a href="logout.php" class="nav-link text-white">Se déconnecter</a></li>
						';

				}else{
					echo '
					<li class="nav-item"><a href="/hospital/index.php" class="nav-link text-white">Home</a></li>
					<li class="nav-item"><a href="/hospital/admin_login.php" class="nav-link text-white">Administrateur</a></li>
					<li class="nav-item"><a href="/hospital/doctor_login.php" class="nav-link text-white">Docteur</a></li>
					<li class="nav-item"><a href="/hospital/patient_login.php" class="nav-link text-white">Patient</a></li>';
				}
			 ?>
		
		</ul>
	</nav>

</body>
</html>