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
	 				<h5 class="text-center my-4">voir la facture</h5>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3">
	 							
	 						</div>
	 						<div class="col-md-6">
	 							<?php 
	 								if (isset($_GET['id'])) {
	 									$id = $_GET['id'];
	 									$result = $dbh->query("SELECT * FROM income WHERE id='$id'");
	 									$row = $result->fetch();

	 								}
	 							?>
	 							<table class="table table-bordered">
	 								<tr>
	 									<td colspan="2" class="text-center">détails</td>
	 								</tr>
	 								<tr>
	 									<td>docteur</td>
	 									<td><?php echo $row['doctor']; ?> </td>
	 								</tr>
	 								<tr>
	 									<td>patient</td>
	 									<td><?php echo $row['patient']; ?> </td>
	 								</tr>
	 								<tr>
	 									<td>date de sortie</td>
	 									<td><?php echo $row['date_discharge']; ?> </td>
	 								</tr>
	 								<tr>
	 									<td>frais</td>
	 									<td><?php echo $row['amount']; ?> </td>
	 								</tr>
	 								<tr>
	 									<td>description</td>
	 									<td><?php echo $row['description']; ?> </td>
	 								</tr>

	 								

	 							</table>
	 						</div>
	 						
	 					</div>
	 					
	 				</div>
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>


</body>
</html>