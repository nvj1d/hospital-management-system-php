<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>TOUS LES MÉDECINS</title>
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
						include("side_nav.php") 
					?>

				</div>
				<div class="col-md-10 my-2">
					<h5 class="text-center">TOUS LES MÉDECINS</h5>
					<?php 
						$result = $dbh->query("SELECT * FROM doctors WHERE statut='Approved' ORDER BY data ASC"); 
						$output ="";
						$output .="
							<table class ='table table-bordered mx-0'>
							<tr>
								<th>ID</th>
								<th>prénom</th>
								<th>nom</th>
								<th>USERNAME</th>
								<th>e-mail</th>
								<th>sexe</th>
								<th>téléphone</th>
								<th>pays</th>
								<th>salaire</th>
								<th>date d'inscription</th>
								<th>action</th>
								</tr>
							";
							if ($result-> rowCount() < 1) {
								$output .="
									<tr>
									<td colspan='10' class'text-center'>AUCUNE DEMANDE D'EMPLOI ENCORE !</td>
									</tr>
								";
									
							}
							while ($row = $result -> fetch()) {
								$output.="
									<tr>
										<td>".$row['id']."</td>
										<td>".$row['firstname']."</td>
										<td>".$row['lastname']."</td>
										<td>".$row['username']."</td>
										<td>".$row['email']."</td>
										<td>".$row['gender']."</td>
										<td>".$row['phone']."</td>
										<td>".$row['pays']."</td>
										<td>".$row['salaire']."</td>
										<td>".$row['data']."</td>
										<td>
											<a href='edit.php?id=".$row['id']."'>
												<button class='btn btn-info'>Edit</button>
											</a>
										</td>
								";
								if (isset($_POST['appr'])) {
									$id = $row['id'];
									$dbh->query("UPDATE doctors SET statut='Approved' WHERE id='$id'");
								}else if(isset($_POST['appr'])){
									$id = $row['id'];
									$dbh->query("UPDATE doctors SET statut='Rejected' WHERE id='$id'");
								}

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