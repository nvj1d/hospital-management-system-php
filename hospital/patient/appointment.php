<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>prenez un rendez-vous</title>
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
	 				<?php include("side_nav.php") ?>
	 			</div>
	 			<div class="col-md-10 my-2">
	 				<h5 class="text-center">prenez un rendez-vous</h5>
	 					<?php 
	 					$pat = $_SESSION['patient'];
	 					$result = $dbh->query("SELECT * FROM patients WHERE username = '$pat'");

	 					$row = $result->fetch();
	 					$firstname = $row['firstname'];
	 					$lastname = $row['lastname'];
	 					$gender = $row['gender'];
	 					$phone = $row['phone'];

	 					if (isset($_POST['book'])) {
	 						$date = $_POST['date'];
	 						$sym = $_POST['sym'];
	 					}

	 					if (empty($sym)) {
	 						# code...
	 					}else{
	 						$result = $dbh->query("INSERT INTO appointments(firstname,lastname,gender,phone,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$lastname
	 						','$gender','$phone','$date','$sym','pendding',NOW())");

	 						if ($result) {
	 							echo "<script>alert('vous avez pris un rendez-vous!');</script>";
	 						}
	 					}


	 				 ?>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3">
	 							
	 						</div>
	 						<div class="col-md-6 jumbotron">
	 							<form method="post">
	 								<label>date de rendez-vous</label>
	 								<input type="date" name="date" class="form-control">
	 								<label>symptômes</label>
	 								<input type="text" name="sym" class="form-control">
	 								<input type="submit" name="book" class="btn btn-success form-control my-4">
	 								
	 							</form>
	 							
	 						</div>
	 						
	 					</div>
	 					
	 				</div>

	 				
	 			</div>
	 		</div>
	 		
	 	</div>
	 	
	 </div>
</body>
</html>