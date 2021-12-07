<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>MON PROFIL</title>
	<link rel="stylesheet" type="text/css" href="css/patient.css">
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
	 					$patient = $_SESSION['patient'];
	 					$result = $dbh->query("SELECT * FROM patients WHERE username='$patient'");
	 					$row = $result->fetch()

	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 						<?php 
	 							if (isset($_POST['upload'])) {
	 								$img = $_FILES['img']['name'];

	 								if (empty($img)) {
	 									# code...
	 								}else{
	 									$result = $dbh->query("UPDATE patients SET profile='$img' WHERE username = '$patient'");

	 									if ($result) {
	 										move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
	 									}
	 								}
	 							}
	 						 ?>
	 						<h5 class="text-white text-center">MON PROFIL</h5>
	 						<form method="post" enctype="multipart/form-data">
	 							<?php 
	 								echo "<img src='img/".$row['profile']."' style='height:200px;' id='pat_pic'>"; 
	 							?>	
	 							<input type="file" name="img" class="form-control my-2">
	 							<input type="submit" name="upload" class="btn btn-success form-control my-2" value="mettre à jour le profil">
	 						</form>
	 						<table class="table table-bordered my-2">
	 							<tr>
	 								<th colspan="2" class="text-center">Mes Details</th>
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
	 								<td>nom de l'utilisateur</td>
	 								<td><?php echo $row['username']; ?> </td>
	 							</tr>
	 							<tr>
	 								<td>E-mail</td>
	 								<td><?php echo $row['email']; ?></td>
	 							</tr>
	 							<tr>
	 								<td>téléphone</td>
	 								<td><?php echo $row['phone']; ?></td>
	 							</tr>
	 							<tr>
	 								<td>genre</td>
	 								<td><?php echo $row['gender']; ?></td>
	 							</tr>
	 							<tr>
	 								<td>pays</td>
	 								<td><?php echo $row['country']; ?></td>
	 							</tr>

	 							
	 						</table>
	 						
	 					</div>
	 					<div class="col-md-6 my-2">
	 						<h5 class="text-center">changer le Nom d'utilisateur</h5>
	 						<?php 
	 							if (isset($_POST['change_username'])) {
	 								$uname = $_POST['uname'];
	 								if (empty($uname)) {
	 									# code...
	 								}else{
	 										$result = $dbh->query("UPDATE patients SET username='$uname' WHERE username ='$patient'");
	 										if ($result) {
	 											$_SESSION['patient'] = $uname;
	 										}

	 									}
	 								}
	 						 ?>

	 						<form method="post">
	 							<label>Nom d'utilisateur</label>
	 							<input type="text" name="uname" class="form-control">
	 							<input type="submit" name="change_username" class="form-control btn btn-success my-2" value="changer">
	 						</form>
	 						<br>
	 						<h5 class="text-center">changer le mot de passe</h5>
	 							<?php 
	 							if (isset($_POST['change_pass'])) {
	 								$old = $_POST['old_pass'];
	 								$new = $_POST['new_pass'];
	 								$conf = $_POST['conf_pass'];

	 								$result = $dbh->query("SELECT * FROM patients WHERE username ='$patient'");
	 								$row = $result->fetch();
	 								if (empty($old)) {
	 								}else if (empty($new)) {
	 								}else if (empty($conf)) {
	 								}else if ($old != $row['password']) {
	 								}else if ($new != $conf) {
	 								}else{
	 									$dbh->query("UPDATE patients SET password ='$new' WHERE username = '$patient'");
	 								}
	 							}
	 						 ?>
	 						<form method="post">
	 							<div class="form-group">
	 								<label>ancien mot de passe</label>
	 								<input type="password" name="old_pass" class="form-control">
	 								
	 							</div>
	 							<div class="form-group">
	 								<label>nouveau mot de passe</label>
	 								<input type="password" name="new_pass" class="form-control">
	 								
	 							</div>
	 							<div class="form-group">
	 								<label>confirmer le mot de passe</label>
	 								<input type="password" name="conf_pass" class="form-control">
	 								
	 							</div>
	 							<input type="submit" name="change_pass" class="form-control btn btn-success my-2" value="changer">
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