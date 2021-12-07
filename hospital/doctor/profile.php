<?php 
session_start();
#error_reporting(0); remove all errors
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Mon Profil</title>
	<link rel="stylesheet" type="text/css" href="css/style_doc.css">
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
	 				<div class="container-fluid">
	 					<div class="col-md-12">
	 						<div class="row">
	 							<div class="col-md-6">
	 								 <?php 
	 									$doc =$_SESSION['doctor'];
	 									$result = $dbh->query("SELECT * FROM doctors where username='$doc'");
	 									$row = $result->fetch();
	 									if (isset($_POST['upload'])) {
	 										$img = $_FILES['img']['name'];
	 										if (empty($img)) {
	 											
	 										}else{
	 											$result = $dbh->query("UPDATE doctors SET profile = '$img' WHERE username = '$doc'");
	 											if ($result) {
	 												move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
	 											}
	 										}
	 									}


	 								 ?>
	 								 <form method="post" enctype="multipart/form-data">

	 								 	<div class="my-2">
	 								 		<?php echo"
	 								 		<img src='img/".$row['profile']."' style='height: 200px' id='doc_pic'>"; 
	 								 		?>
	 								 	</div>

	 								 	<input type="file" name="img" class="form-control">
	 								 	<input type="submit" name="upload" class="btn btn-success my-3 form-control">
	 								 </form>
	 								 <div class="my-3">
	 								 	<table class="table table-bordered">
	 								 		<tr>
	 								 			<th colspan="2" class="text-center">détails</th>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Prénom</td>
	 								 			<td><?php echo $row['firstname']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>nom</td>
	 								 			<td><?php echo $row['lastname']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>Nom d'utilisateur</td>
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
	 								 			<td>genre</td>
	 								 			<td><?php echo $row['gender']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>pays</td>
	 								 			<td><?php echo $row['pays']; ?></td>
	 								 		</tr>
	 								 		<tr>
	 								 			<td>salaire</td>
	 								 			<td><?php echo $row['salaire']; ?></td>
	 								 		</tr>
	 								 	</table>
	 								 	
	 								 </div>
	 								
	 							</div>
	 							<div class="col-md-6">
	 								<h5 class="text-center my-2">changer le nom d'utilisateur</h5>
	 									<?php
	 									if (isset($_POST['change_uname'])) {
	 									 	$uname = $_POST['uname'];
	 									 	if (empty($uname)) {
	 									 		
	 									 	}else{
	 									 		$result = $dbh->query("UPDATE doctors SET username ='$uname' WHERE username ='$doc'");
	 									 		if ($result) {
	 									 			$_SESSION['doctor'] = $uname;
	 									 		}
	 									 	}
	 									 } 

	 								 ?>
	 								<form method="post" action="profile.php">
	 									<input type="text" name="uname" class="form-control">
		 								<br>
		 								<input type="submit" name="change_uname" class="btn btn-success form-control" value="changer">
	 								</form>
	 								
	 								<br>
	 								<h5 class="text-center my-2">changer le mot de passe</h5>
	 								<?php 
	 									if (isset($_POST['change_pass'])) {
	 										$old = $_POST['old_pass'] ;
	 										$new = $_POST['new_pass'] ;
	 										$conf = $_POST['conf_pass'];
	 										$result = $dbh->query("SELECT * FROM doctors WHERE username = '$doc'");
	 										$row = $result->fetch();
	 										if ($old != $row['password']) {
	 											
	 										}else if (empty($new)) {
	 											# code...
	 										}else if ($conf != $new) {
	 											# code...
	 										}else{
	 											$dbh->query("UPDATE doctors SET password='$new' WHERE username = '$doc'");
	 										}


	 									}
	 								 ?>

	 								<form method="post" action="profile.php">
	 									<div class="form-group">
	 										<label>ancien mot de passe</label>
	 										<input type="password" name="old_pass" class="form-control">
	 										
	 									</div>
	 									<div class="form-group">
	 										<label>nouveau mot de passe</label>
	 										<input type="password" name="new_pass" class="form-control">
	 										
	 									</div>
	 									<div class="form-group">
	 										<label>Confirmez le mot de passe</label>
	 										<input type="password" name="conf_pass" class="form-control">
	 										
	 									</div>
	 									<input type="submit" name="change_pass" value="changer" class="btn btn-success form-control">

	 								</form>
	 							</div>
	 							
	 						</div>
	 						
	 					</div>
	 					
	 				</div>
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>

	 	
	 </div>

</body>
</html>