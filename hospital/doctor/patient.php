<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TOUS LES PATIENTS</title>
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
	 			<div class="col-md-10">
	 				<h5 class="text-center my-3">TOUS LES PATIENTS</h5>
					<?php 
	 					$result = $dbh->query("SELECT * FROM patients");
	 					$output ="";
						$output .="
							<table class ='table table-bordered'>
							<tr>
								<th>ID</th>
								<th>prénom</th>
								<th>nom</th>
								<th>nom d'utilisateur</th>
								<th>e-mail</th>
								<th>téléphone</th>
								<th>sexe</th>
								<th>pays</th>
								<th>date d'inscription</th>
								<th>action</th>
								</tr>
							";
							if ($result-> rowCount() < 1) {
								$output .="
									<tr>
									<td colspan='10' class='text-center'>PAS DE PATIENT ENCORE !
									</td>
									</tr>
								";
									
							}
							while ($row = $result->fetch()) {
								$output.="
									<tr>
										<td>".$row['id']."</td>
										<td>".$row['firstname']."</td>
										<td>".$row['lastname']."</td>
										<td>".$row['username']."</td>
										<td>".$row['email']."</td>
										<td>".$row['gender']."</td>
										<td>".$row['phone']."</td>
										<td>".$row['country']."</td>
										<td>".$row['date_reg']."</td>
										<td>
											<a href='view.php?id=".$row['id']."'>
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