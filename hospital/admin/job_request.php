<?php 

session_start();

include("../include/connection.php");
$result = $dbh->query("SELECT * FROM doctors WHERE statut='Pendding' ORDER BY data ASC");

$output ="";
$output .="
	<table class ='table table-bordered'>
	<tr>
		<th>ID</th>
		<th>prénom</th>
		<th>nom</th>
		<th>nom d'utilisateur</th>
		<th>e-mail</th>
		<th>sexe</th>
		<th>téléphone</th>
		<th>pays</th>
		<th>dat d'inscription</th>
		<th>action</th>
		</tr>
	";
	if ($result-> rowCount() < 1 ) {
		$output .="
			<tr>
			<td colspan='10' class='text-center'>AUCUNE DEMANDE D'EMPLOI ENCORE !</td>
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
				<td>".$row['pays']."</td>
				<td>".$row['data']."</td>
				<td>
					<form method='post'>
						<button name='appr'>approve
						</button>
						<button name='rej'>reject
						</button>
					<form>
				</td>
		";
		if (isset($_POST['appr'])) {
			$id = $row['id'];
			$dbh->query("UPDATE doctors SET statut='Approved' WHERE id='$id'");
		}else if(isset($_POST['rej'])){
			$id = $row['id'];
			$dbh->query("UPDATE doctors SET statut='Rejected' WHERE id='$id'");
		}

	}
	$output .="
		</tr>
		</table>
	";
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>DEMANDES D'EMPLOI</title>
</head>
<body>
	<?php include("../include/header.php"); ?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php include("side_nav.php"); ?>
					
				</div>
				<div class="col-md-10 my-2">
					<h5 class="text-center">DEMANDES D'EMPLOI</h5>
					<?php echo $output; ?>
					<div id="show"></div>
					
				</div>
				
			</div>
			
		</div>
		
	</div>

</body>
</html>