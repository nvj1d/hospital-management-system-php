<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>mon profil</title>
	<link rel="stylesheet" type="text/css" href="style_admin.css">
</head>
<body>
	<?php 
		include("../include/header.php"); 
		include("../include/connection.php");

		$ad = $_SESSION['admin'];

		$result = $dbh->query("SELECT * FROM admin WHERE username = '$ad'");

		while ($row = $result->fetch()) {
			$username = $row['username'];
			$profiles = $row['profile'];
		}
	?>
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-2">
					<?php include("side_nav.php"); ?>
				</div>
				<div class="col-md-10">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-6">
								<h4><?php echo $username; ?> profil</h4>
								<?php 
									if (isset($_POST['update'])) {
										$profile = $_FILES['profile']['name'];
										if (empty($profile)) {
											
										}else{
											$result = $dbh->query("UPDATE admin SET profile ='$profile' WHERE username ='$ad'");
											if ($result) {
												move_uploaded_file($_FILES['profile']['tmp_name'], "../img/uploads/$profile");
											}
										}
									}
								 ?>
								<form method="post" enctype="multipart/form-data">
									<?php 
										echo "
										<img src='../img/uploads/$profiles' alt='profile' style='height: 200px;' class='admin_pic'>

										";
									 ?>

									<br>
									<div class="form-group">
										<label>mettre à jour le profil:</label>
										<input type="file" name="profile" class="form-control">
										
									</div>
									<input type="submit" name="update" value="mettre à jour" class="btn btn-success form-control">
								</form>
								
							</div>
							<div class="col-md-6">
								<?php 
									if (isset($_POST['change'])) {
										$uname = $_POST['uname'];
										if (empty($uname)) {

										}else{
											$result = $dbh->query("UPDATE admin SET username = '$uname' WHERE username = '$ad'");
											if ($result) {
												$_SESSION['admin'] = $uname;
											}

										}

									}
								 ?>
								
								<form method="post" class="my-2">
									<div class="form-group">
									<h4>changer le nom d'utilisateur</h4>
									<input type="text" name="uname" class="form-control">
									</div>
									<input type="submit" name="change" class="btn btn-success form-control" value="changer">
									
								</form>
								<br>
								<?php 
									if (isset($_POST['update_pass'])) {
										$old_pass = $_POST['old_pass'];
										$new_pass = $_POST['new_pass'];
										$conf_pass =$_POST['conf_pass'];

										$error = array();
										$result = $dbh->query("SELECT * FROM admin WHERE username='$ad'");
										$row = $result->fetch();
										$pass = $row['password'];
										if (empty($old_pass)) {
											$error['p'] = "entrer old password";
										}else if (empty($new_pass)) {
											$error['p'] = "enter new passwrd";
										}else if (empty($conf_pass)) {
											$error['p'] = "confirmer le mot de pass";
										}else if ($old_pass != $pass) {
											$error['p'] = "invalid old passwrd!"; 
										}else if ($new_pass != $conf_pass) {
											$error['p'] = "passwords does not match!";
										}

										if (count($error) == 0) {
											$dbh->query("UPDATE admin SET password = '$new_pass' WHERE username = '$ad'");
										}
									}
									if (isset($error['p'])) {
											$e = $error['p'] ;
											$show = "<h5 class='text-center alert alert-danger'>$e</h5>";
											}else{
											$show ="";
										}
							
								 ?>
								
								<form method="post" class="my-3">
									<h4>changer le mot de passe</h4>
									<div>
										<?php echo $show; ?>
									</div>
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
									<input type="submit" name="update_pass" value="changer" class="btn btn-success form-control" >
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
