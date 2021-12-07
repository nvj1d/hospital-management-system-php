<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>tous les administrateurs</title>
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
	 			<div class="col-md-10 my-2">
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<h5 class="text-center">tous les administrateurs</h5>
	 							
	 							<?php 
	 								$ad = $_SESSION['admin'];
	 								$result = $dbh->query("SELECT * FROM admin WHERE username != '$ad'");
	 								$output ="
	 									<table class='table table-bordered'>
	 								<tr>
	 								<th>ID</th>
	 								<th>nom d'utilisateur</th>
	 								<th>action</th> 
	 								<tr>
	 								";
	 								if ($result-> rowCount() < 1 ) {
	 									$output .= "<tr><td colspan='3' class='text-center'>No New admin</td></tr>";
	 								}
	 								while ( $row = $result -> fetch() ) {
	 									$id = $row['id'];
	 									$username = $row['username'];
	 									$output .= "<tr>
	 									<td>$id</td>
	 									<td>$username</td>
	 									<td>
	 										<a href='admin.php?id=$id'><button id='$id' class='btn btn-danger remove'>remove</button></a>
	 									</td>"; 

	 								}
	 								$output .="
	 									</tr>
	 								
	 									</table>
	 								";
	 								echo $output;
	 								if (isset($_GET['id'])) {
	 									$id = $_GET['id'];
	 									$dbh->query("DELETE FROM admin WHERE id = '$id'");

	 								}
	 							 ?>
	 				
	 						</div>
	 						<div class="col-md-6">
	 							<?php 
	 								if (isset($_POST['add'])) {
	 									$uname = $_POST['uname'];
	 									$pass = $_POST['pass'];
	 									$image = $_FILES['img']['name'];

	 									$error = array();

	 									if (empty($uname)) {
	 										$error['u'] = "enter admin username";
	 									}else if (empty($pass)) {
	 										$error['u'] = "enter password";
	 									}else if (empty($image)) {
	 										$error['u'] = "add admin picture";
	 									}
	 									if (count($error) == 0) {
	 										$result = $dbh->query("INSERT INTO admin(username,password,profile) VALUES('$uname','$pass','$image')");
	 										if ($result) {
	 											move_uploaded_file($_FILES['img']['tmp_name'],"../img/uploads/$image");
	 										}else{

	 										}
	 									}
	 								}
	 								if (isset($error['u'])) {
	 									$er = $error['u'];
	 									$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
	 								}else{
	 									$show ="";
	 								}


	 							 ?>
	 							<h5 class="text-center">Ajouter un administrateur</h5>
	 							<form method="post" enctype="multipart/form-data">
	 								<div>
	 									<?php echo $show; ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Nom d'utilisateur</label>
	 									<input type="text" name="uname" class="form-control">
	 									
	 								</div>
	 								<div class="form-group">
	 									<label>le mot de passe</label>
	 									<input type="password" name="pass" class="form-control">
	 									
	 								</div>
	 								<div class="form-group">
	 									<label>photo de l'administrateur</label>
	 									<input type="file" name="img" class="form-control">
	 									
	 								</div><br>
	 								<input type="submit" name="add" value="add new admin" class="btn btn-success form-control">
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