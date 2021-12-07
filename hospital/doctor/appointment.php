<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TOUS LES RENDEZ-VOUS</title>
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
	 				<h5 class="text-center my-3">TOUS LES RENDEZ-VOUS</h5>
					<?php 
						$result = $dbh->query("SELECT * FROM appointments WHERE status ='pendding'");
						$output ="";
						$output .="
							<table class ='table table-bordered'>
							<tr>
								<th>ID</th>
								<th>prénom</th>
								<th>nom</th>
								<th>sexe</th>
								<th>téléphone</th>
								<th>date de rendez-vous</th>
								<th>symptômes</th>
								<th>date de réservation</th>
								<th>Action</th>
							</tr>
							";

							if ($result-> rowCount() < 1) {
								$output .="
									<tr>
									<td colspan='8' class='text-center'>PAS DE RENDEZ-VOUS ENCORE !</td>
									</tr>
								";
									
							}
							while ($row = $result->fetch()) {
								$output.="
									<tr>
										<td>".$row['id']."</td>
										<td>".$row['firstname']."</td>
										<td>".$row['lastname']."</td>
										<td>".$row['gender']."</td>
										<td>".$row['phone']."</td>
										<td>".$row['appointment_date']."</td>
										<td>".$row['symptoms']."</td>
										<td>".$row['date_booked']."</td>
										<td>
											<a href='discharge.php?id=".$row['id']."'>
											<button class='btn btn-info'>check</button>	
											</a>

										</td>
								";
							}
							$output .="
								</tr>
								</table>
							";
							echo $output;

					 ?>
							
	 			</div>
	 			
	 		</div>
	 	</div> 
	 	
	 </div>

</body>
</html>