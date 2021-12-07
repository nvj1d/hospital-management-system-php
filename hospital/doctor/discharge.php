<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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

	 				<div class="col-md-10">
	 					<h5 class="text-center">rendez-vous total</h5>
	 					<?php 
	 						if (isset($_GET['id'])) {
	 							$id = $_GET['id'];
	 							$result = $dbh->query("SELECT * FROM appointments WHERE id='$id'");
	 							$row = $result->fetch();

	 						}
	 					 ?>
	 					<div class="col-md-12">
	 						<div class="row">
	 							<div class="col-md-6">
	 								<table class="table table-bordered">
	 									<tr>
	 										<td colspan="2" class="text-center">détails du rendez-vous</td>
	 									</tr>
	 									<tr>
	 										<td>prénom</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['firstname'];
	 										} ?></td>
	 									</tr>
	 									<tr>
	 										<td>nom</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['lastname'];
	 										} ?></td>
	 									</tr>
	 									<tr>
	 										<td>sexe</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['gender'];
	 										} ?></td>
	 									</tr>
	 									<tr>
	 										<td>téléphone</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['phone'];
	 										} ?></td>
	 									</tr>
	 									<tr>
	 										<td>date de rendez-vous</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['appointment_date'];
	 										} ?></td>
	 									</tr>
	 									<tr>
	 										<td>symptômes</td>
	 										<td><?php if (isset($row)) {
	 											echo $row['symptoms'];
	 										} ?></td>
	 									</tr>
	 									
	 								</table>
	 								
	 							</div>
	 							<div class="col-md-6">
	 								<h5 class="text-center my-3">Facture</h5>
	 								<?php 
	 									if (isset($_POST['send'])) {
	 										$fee = $_POST['fee'];
	 										$desc = $_POST['desc'];

	 										if (empty($fee)) {
	 											# code...
	 										}else if (empty($desc)) {
	 											# code...
	 										}else{
	 											$doc = $_SESSION['doctor'];
	 											$fname = $row['firstname'];
	 											$result = $dbh->query("INSERT INTO income(doctor,patient,date_discharge,amount,description) VALUES('$doc','$fname',NOW(),'$fee','$desc')");
	 											if ($result) {
	 												/*echo "<script>alert('you have send invoice');</script>";*/
	 												$dbh->query("UPDATE appointments SET status='discharge' WhERE id ='$id'");
	 											}
	 										}
	 									}
	 								 ?>
	 								<form method="post">
	 									<div class="form-group">
	 										<label>frais</label>
	 										<input type="text" name="fee" class="form-control">
	 										
	 									</div>
	 									<div class="form-group">
	 										<label>description</label>
	 										<input type="text" name="desc" class="form-control">
	 										
	 									</div>
	 									<input type="submit" name="send" class="btn btn-info form-control my-2" value="send">
	 									
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