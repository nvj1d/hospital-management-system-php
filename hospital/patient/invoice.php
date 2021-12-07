<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>MA FACTURE</title>
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
	 				<h5 class="text-center">MA FACTURE</h5>
					<?php 
	 					$pat = $_SESSION['patient'];
	 					$result = $dbh->query("SELECT * FROM patients WHERE username = '$pat'");
	 					$row = $result->fetch();
	 					$fname = $row['firstname'];
	 					$result = $dbh->query("SELECT * FROM income WHERE patient = '$fname'");
	 					$output ="";
						$output .="
							<table class ='table table-bordered'>
							<tr>
								<th>ID</th>
								<th>docteur</th>
								<th>patient</th>
								<th>date de sortie</th>
								<th>frais</th>
								<th>description</th>
								<th>action</th>
								</tr>
							";
							if ($result-> rowCount() < 1) {
								$output .="
									<tr>
										<td colspan='10' class='text-center'>AUCUNE FACTURE ENCORE !
										</td>
									</tr>
								";
									
							}
							while ($row = $result->fetch()) {
								$output.="
									<tr>
										<td>".$row['id']."</td>
										<td>".$row['doctor']."</td>
										<td>".$row['patient']."</td>
										<td>".$row['date_discharge']."</td>
										<td>".$row['amount']."</td>
										<td>".$row['description']."</td>
										<td>
											<a href='check.php?id=".$row['id']."'>
												<button class='btn btn-info'>view</button>
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