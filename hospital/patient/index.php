<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>patient</title>
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
					<?php 
						include("side_nav.php");
					 ?>
					
				</div>
				<div class="col-md-10 my-3">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-3 bg-info mx-2" id="imgs_p">
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
							<div class="col-md-3 bg-info mx-2" id="imgs_p">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
										<h5 class="text-white my-4">prenez rendez-vous</h5>
										
									</div>
									<div class="col-md-4">
										<a href="appointment.php"><i class="fa fa-calendar fa-3x my-4" style="color: white;"></i></a>
										
									</div>
										
									</div>
									
								</div>
							</div>
							<div class="col-md-3 bg-info mx-2" id="imgs_p">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-8">
										<h5 class="text-white my-4">Ma facture</h5>
										
									</div>
									<div class="col-md-4">
										<a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i></a>
										
									</div>
										
									</div>
									
								</div>
							</div>
							
						</div>
						
					</div>
					
					<div class="container">
						<div class="col-md-12">
						<div class="row">
							<div class="col-md-2">
								<?php 
						if (isset($_POST['send'])) {
							$title = $_POST['title'];
							$message = $_POST['message'];

							if (empty($title)) {
								# code...
							}else if (empty($message)) {
								# code...
							}else{
								$user = $_SESSION['patient'];
								$dbh->query("INSERT INTO reports(username,title,message,date_send) VALUES('$user','$title','$message',NOW())");
								/*if (!$result) {
									echo "<script>alert('failed!');</script>";
								}*/

							}

						}
					 ?>
								
							</div>
							<div class="col-md-6 jumbotron bg-info my-3">
								<h5 class="tect-center my-2 text-white text-center">envoyer un rapport</h5>
								<form method="post" action="index.php">
									<div class="form-group">
										<label class="text-white">titre</label>
										<input type="text" name="title" class="form-control" placeholder="enter title of the report">
									</div>
									<div class="form-group">
										<label class="text-white">message</label>
										<input type="text" name="message" autocomplete="off" class="form-control" placeholder="enter message">
									</div>
									<input type="submit" name="send" value="envoyer" class="btn btn-success my-2 form-control">
									
								</form>
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