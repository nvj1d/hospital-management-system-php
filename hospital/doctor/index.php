<?php session_start(); ?>
<html>
<head>
	<title>Docteur</title>
	<link rel="stylesheet" type="text/css" href="css/style_doc.css">
</head>
<body>
	<?php 
		include("../include/header.php");
		include("../include/connection.php");
	 ?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php include("side_nav.php"); ?>
					
				</div>
				<div class="col-md-10 my-2">
					<div class="container-fluid">
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<h5 class="text-white my-4">MON PROFIL</h5>
												
											</div>
											<div class="col-md-4">
												<a href="profile.php"><i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i></a>
											</div>
											
										</div>
										
									</div>
									
								</div>
								<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<?php 
													$result = $dbh->query("SELECT * FROM patients");
													$num = $result-> rowCount();
											 	?>
												<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num; ?></h5>
												<h5 class="text-white">PATIENTS</h5>
												
											</div>
											<div class="col-md-4">
												<a href="patient.php"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i></a>
											</div>
											
										</div>
										
									</div>
									
								</div>
								<div class="col-md-3 my-2 bg-info mx-2" style="height: 150px;">
									<div class="col-md-12">
										<div class="row">
											<div class="col-md-8">
												<?php 
													$result = $dbh->query("SELECT * FROM patients");
													$num = $result-> rowCount();
											 	?>
												<h5 class="text-white my-2" style="font-size: 30px;"><?php echo $num; ?></h5>
												<h5 class="text-white">Rendez-vous</h5>
												
											</div>
											<div class="col-md-4">
												<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
											</div>
											
										</div>
										
									</div>
									
								</div>
							
							</div>
						
						</div>
						
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>