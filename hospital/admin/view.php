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
	 				<h5 class="text-center my-3">détails du patient</h5>
	 				<?php 
	 					if (isset($_GET['id'])) {
	 						$id = $_GET['id'];
	 						$result = $dbh->query("SELECT * FROM patients WHERE id ='$id'");
	 						$row = $result->fetch();
	 					}

	 				 ?>
	 				 <div class="col-md-12">
	 				 	<div class="row">
	 				 		<div class="col-md-3">
	 				 		
	 				 	</div>
	 				 	<div class="col-md-6">
	 				 		<?php 
	 				 			echo "<img src='../patient/img/".$row['profile']."' class='my-2 col-md-12' height='200px;'>"
	 				 		 ?>
	 				 		<table class="table table-bordered">
	 				 			<tr>
	 				 				<th class="text-center" colspan="2">détails</th>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>prénom</td>
	 				 				<td><?php echo $row['firstname']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>nom</td>
	 				 				<td><?php echo $row['lastname']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>nom d'utilisateur</td>
	 				 				<td><?php echo $row['username']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>e-mail</td>
	 				 				<td><?php echo $row['email']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>téléphone</td>
	 				 				<td><?php echo $row['phone']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>sexe</td>
	 				 				<td><?php echo $row['gender']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>pays</td>
	 				 				<td><?php echo $row['country']; ?></td>
	 				 			</tr>
	 				 			<tr>
	 				 				<td>date d'inscription</td>
	 				 				<td><?php echo $row['date_reg']; ?></td>
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