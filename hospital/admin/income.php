<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>REVENU TOTAL</title>
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
	 			<div class="col-md-10">
	 				<h5 class="text-center my-2">REVENU TOTAL</h5>
	 					<?php 
	 					$result = $dbh->query("SELECT * FROM income");
	 					$output ="";
						$output .="
							<table class ='table table-bordered'>
							<tr>
								<td>ID</td>
								<td>docteur</td>
								<td>patient</td>
								<td>date de sortie</td>
								<td>frais</td>
							</tr>
							";

							if ($result->fetchColumn() < 1) {
								$output .="
									<tr>
									<td colspan='4' class='text-center'>PAS ENCORE DE SORTIE DU PATIENT !
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