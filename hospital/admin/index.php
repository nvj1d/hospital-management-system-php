<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>administrateur</title>
	<link rel="stylesheet" type="text/css" href="style_admin.css">
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
					<!-- side nav-->
					<?php 
					include("side_nav.php");
					 ?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12 my-2">
						<div class="row">
							<div class="col-md-3 bg-info mx-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php 
												$result = $dbh->query("SELECT * FROM admin");
												$num = $result-> rowCount();
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">TOTALE</h5>
											<h5 class="text-white">ADMINISTRATEURS</h5>
											
										</div>
										<div class="col-md-4">
											<a href="admin.php">
												<i class="fa fa-users-cog fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
										</div>

										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php 
												$result = $dbh->query("SELECT * FROM doctors WHERE statut='Approved'");
												$num = $result-> rowCount();
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">MÉDECINS</h5>
											
										</div>
										<div class="col-md-4">
											<a href="doctor.php">
												<i class="fas fa-user-md fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
										</div>

										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php
												$result = $dbh->query("SELECT * FROM patients");
												$num = $result-> rowCount();
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">PATIENTS</h5>
											
										</div>
										<div class="col-md-4">
											<a href="patient.php">
												<i class="fas fa-procedures fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
										</div>

										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2 my-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php 
												$result = $dbh->query("SELECT * FROM reports");
												$num = $result-> rowCount();
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">RAPPORTS</h5>
											
										</div>
										<div class="col-md-4">
											<a href="report.php">
												<i class="fas fa-flag fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
										</div>

										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2 my-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php 
												$result = $dbh->query("SELECT * FROM doctors WHERE statut ='pendding'");
												$num = $result-> rowCount();
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
											<h5 class="text-white">DEMANDES D'EMPLOI</h5>
											
										</div>
										<div class="col-md-4">
											<a href="job_request.php">
												<i class="fas fa-book-open fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
										</div>

										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2 my-2" id="at_size">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
											<?php 
												$result = $dbh->query("SELECT sum(amount) as profit FROM income");
												$row = $result->fetch();

												$inc = $row['profit'];
											 ?>
											<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $inc; ?></h5>
											<h5 class="text-white">REVENU</h5>
											
										</div>
										<div class="col-md-4">
											<a href="income.php">
												<i class="fas fa-dollar-sign fa-3x my-4" style="color: white;">
													
												</i>
											</a>
											
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